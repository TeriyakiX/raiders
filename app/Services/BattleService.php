<?php

namespace App\Services;

use App\Http\Resources\CardResource\CardResourceShow;
use App\Models\Battle;
use App\Models\BattleLog;
use App\Models\Card;
use App\Models\CharacterParameters;
use App\Models\League;
use App\Models\Squad;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BattleService
{
    protected $freezeDuration = 300;

    protected $userService;
    protected $cardService;

    public function __construct(UserService $userService, CardService $cardService)
    {
        $this->userService = $userService;
        $this->cardService = $cardService;
    }

    public function startBattle($attacker_id, $defender_id, $event_id = null)
    {
        $attacker = User::find($attacker_id);
        $defender = User::find($defender_id);

        if (!$attacker || !$defender) {
            throw new Exception("Attacker or Defender not found");
        }

        $attackerSquad = Squad::where('user_id', $attacker_id)
            ->where('event_id', $event_id)
            ->with('card')
            ->get();
        $defenderSquad = Squad::where('user_id', $defender_id)
            ->where('event_id', $event_id)
            ->with('card')
            ->get();

        foreach ($attackerSquad as $squadMember) {
            $frozenStatus = $squadMember->card->getFrozenStatus();
            if ($frozenStatus['is_frozen']) {
                throw new Exception(
                    json_encode([
                        'attacker_card' => [
                            'id' => $squadMember->card->id,
                            'is_frozen' => $frozenStatus['is_frozen'],
                            'remaining_time' => $frozenStatus['remaining_time'],
                        ]
                    ])
                );
            }
        }

        foreach ($defenderSquad as $squadMember) {
            $frozenStatus = $squadMember->card->getFrozenStatus();
            if ($frozenStatus['is_frozen']) {
                throw new Exception(
                    json_encode([
                        'defender_card' => [
                            'id' => $squadMember->card->id,
                            'is_frozen' => $frozenStatus['is_frozen'],
                            'remaining_time' => $frozenStatus['remaining_time'],
                        ]
                    ])
                );
            }
        }

        $battle = Battle::create([
            'attacker_id' => $attacker_id,
            'defender_id' => $defender_id,
            'attacker_initial_cups' => $attacker->cups,
            'defender_initial_cups' => $defender->cups,
            'event_id' => $event_id,
            'status' => 'in_progress',
        ]);

        return $battle;
    }

    public function performBattle($battle_id)
    {
        try {
            $battle = Battle::findOrFail($battle_id);

            $eventId = $battle->event_id;
            if (!$eventId) {
                throw new \Exception("Event ID is missing in battle.");
            }

            $attackerSquad = Squad::where('user_id', $battle->attacker_id)
                ->where('event_id', $eventId)
                ->with('card')
                ->get();
            $defenderSquad = Squad::where('user_id', $battle->defender_id)
                ->where('event_id', $eventId)
                ->with('card')
                ->get();

            // Проверка на замороженные карты
            foreach ($attackerSquad as $squadMember) {
                if ($squadMember->card->frozen_until && $squadMember->card->frozen_until > now()) {
                    throw new \Exception("Attacker's card is frozen until " . $squadMember->card->frozen_until);
                }
            }

            foreach ($defenderSquad as $squadMember) {
                if ($squadMember->card->frozen_until && $squadMember->card->frozen_until > now()) {
                    throw new \Exception("Defender's card is frozen until " . $squadMember->card->frozen_until);
                }
            }

            // Сортировка карт по инициативе
            $attackerCards = $attackerSquad->pluck('card')->unique('id')->values();
            $defenderCards = $defenderSquad->pluck('card')->unique('id')->values();

            if (empty($attackerCards) || empty($defenderCards)) {
                throw new \Exception("Один из игроков не имеет карт в отряде.");
            }

            // Сортировка карт по инициативе
            $attackerCards = $attackerCards->sortByDesc(function ($card) {
                return $this->getCardInitiative($card);
            });
            $defenderCards = $defenderCards->sortByDesc(function ($card) {
                return $this->getCardInitiative($card);
            });

            $rounds = min(count($attackerCards), count($defenderCards));
            $attackerWins = 0;
            $defenderWins = 0;
            $battleLog = [];

            foreach (range(0, $rounds - 1) as $i) {
                $attackerCard = $attackerCards[$i];
                $defenderCard = $defenderCards[$i];

                $attackerParams = $this->getCharacterParameters($attackerCard);
                $defenderParams = $this->getCharacterParameters($defenderCard);

                $attackerScore = $attackerParams->damage_numeric + $attackerParams->shield_numeric + $attackerParams->health_numeric;
                $defenderScore = $defenderParams->damage_numeric + $defenderParams->shield_numeric + $defenderParams->health_numeric;

                if ($attackerScore < $defenderScore) {
                    $attackerCard->frozen_until = now()->addMinute();
                    $attackerCard->save();
                } elseif ($defenderScore < $attackerScore) {
                    $defenderCard->frozen_until = now()->addMinute();
                    $defenderCard->save();
                }

                $roundResult = [
                    'round' => $i + 1,
                    'attacker_card' => (new CardResourceShow($attackerCard))->toArray(request()),
                    'defender_card' => (new CardResourceShow($defenderCard))->toArray(request()),
                    'result' => $attackerScore > $defenderScore ? 'Attacker wins' : ($attackerScore < $defenderScore ? 'Defender wins' : 'Draw')
                ];

                BattleLog::create([
                    'battle_id' => $battle_id,
                    'round' => $i + 1,
                    'attacker_card_id' => $attackerCard->id,
                    'defender_card_id' => $defenderCard->id,
                    'result' => $roundResult['result'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $battleLog[] = $roundResult;

                if ($attackerScore > $defenderScore) {
                    $attackerWins++;
                } else {
                    $defenderWins++;
                }
            }

            $attackerUser = User::find($battle->attacker_id);
            $defenderUser = User::find($battle->defender_id);

            $attackerChange = 0;
            $defenderChange = 0;

            if ($attackerWins > $defenderWins) {
                $attackerChange = 10;
                if ($defenderUser->cups >= 10) {
                    $defenderChange = -10;
                }
            } elseif ($defenderWins > $attackerWins) {
                $defenderChange = 10;
                if ($attackerUser->cups >= 10) {
                    $attackerChange = -10;
                }
            }

            $attackerUser->cups = max(0, $attackerUser->cups + $attackerChange);
            $defenderUser->cups = max(0, $defenderUser->cups + $defenderChange);

            $this->assignLeague($attackerUser);
            $this->assignLeague($defenderUser);

            $attackerUser->save();
            $defenderUser->save();

            $battle->status = 'completed';
            $battle->attacker_final_cups = $attackerChange >= 0 ? "+$attackerChange" : "$attackerChange";
            $battle->defender_final_cups = $defenderChange >= 0 ? "+$defenderChange" : "$defenderChange";
            $battle->save();

            return [
                'battle' => $battle->toArray(),
                'attacker_wins' => $attackerWins,
                'defender_wins' => $defenderWins,
                'battle_log' => $battleLog,
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    protected function assignLeague(User $user)
    {
        $league = League::where('cups_from', '<=', $user->cups)
            ->where('cups_to', '>=', $user->cups)
            ->first();

        if ($league) {
            $user->league_id = $league->id;
        } else {
            $raidersLeague = League::where('name', 'Raiders League')->first();
            $user->league_id = $raidersLeague ? $raidersLeague->id : null;
        }
    }

    protected function compareCards($attackerCard, $defenderCard)
    {
        $attackerParams = $this->getCharacterParameters($attackerCard);
        $defenderParams = $this->getCharacterParameters($defenderCard);

        $attackerScore = $attackerParams->damage_numeric + $attackerParams->shield_numeric + $attackerParams->health_numeric;
        $defenderScore = $defenderParams->damage_numeric + $defenderParams->shield_numeric + $defenderParams->health_numeric;

        if ($attackerScore > $defenderScore) {
            return 1;
        } elseif ($attackerScore < $defenderScore) {
            return -1;
        }
        return 0;
    }

    protected function getCharacterParameters($card)
    {
        $characterId = $this->getCardId($card);
        if (empty($characterId)) {
            throw new \Exception("ID не найден в карточке.");
        }
        return CharacterParameters::where('character_id', $characterId)->firstOrFail();
    }

    public function getCardId($cardObject)
    {
        if (is_array($cardObject)) {
            $cardObject = (object) $cardObject;
        } elseif (is_string($cardObject)) {
            $cardObject = json_decode($cardObject);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("Ошибка декодирования JSON: " . json_last_error_msg());
            }
        } elseif (!is_object($cardObject)) {
            throw new \Exception("Неподдерживаемый тип данных");
        }
        $metadata = $cardObject->metadata ?? null;
        if ($metadata) {
            if (is_array($metadata)) {
                $metadata = (object) $metadata;
            }

            if (isset($metadata->attributes) && is_array($metadata->attributes)) {
                $id = null;
                foreach ($metadata->attributes as $attribute) {
                    if (is_array($attribute)) {
                        $attribute = (object) $attribute;
                    }
                    if (isset($attribute->trait_type) && $attribute->trait_type === 'ID') {
                        $id = $attribute->value;
                        Log::info('Найден ID:', ['id' => $id]);
                        break;
                    }
                }

                if ($id === null) {
                    Log::error('Не удалось найти ID карты в метаданных', ['cardObject' => $cardObject]);
                } else {
                    Log::info('Найден ID карты', ['ID' => $id]);
                }
            } else {
                Log::error('Атрибуты карты отсутствуют в метаданных', ['cardObject' => $cardObject]);
            }
        } else {
            Log::error('Метаданные карты отсутствуют', ['cardObject' => $cardObject]);
        }

        if ($id === null) {
            throw new \Exception("Не удалось найти ID карты в метаданных");
        }

        return $id;
    }

    public function updateCardStatus($cardId, $status)
    {
        $card = Card::find($cardId);
        if ($card) {
            $card->status = $status;
            if ($status === 'frozen') {
                $card->frozen_until = now()->addMinutes(5);
            } else {
                $card->frozen_until = null;
            }
            $card->save();
        }
    }

    protected function getCardInitiative($card)
    {
        $characterParams = $this->getCharacterParameters($card);
        return $characterParams ? $characterParams->initiative_numeric : 0;
    }


    public function getBattleStatus($battle_id)
    {
        try {
            $battle = Battle::findOrFail($battle_id);

            $eventId = $battle->event_id;

            if (!$eventId) {
                throw new \Exception("Event ID is missing in battle.");
            }

            $attackerSquad = Squad::where('user_id', $battle->attacker_id)
                ->where('event_id', $eventId)
                ->with('card')
                ->get();
            $defenderSquad = Squad::where('user_id', $battle->defender_id)
                ->where('event_id', $eventId)
                ->with('card')
                ->get();

            $attackerCards = $attackerSquad->map(function ($squad) {
                return new CardResourceShow($squad->card);
            });

            $defenderCards = $defenderSquad->map(function ($squad) {
                return new CardResourceShow($squad->card);
            });

            $response = [
                'battle' => $battle->toArray(),
                'attacker_squad' => $attackerCards->toArray(),
                'defender_squad' => $defenderCards->toArray(),
            ];

            return response()->json($response);

        } catch (\Exception $e) {
            Log::error("Failed to fetch battle status: " . $e->getMessage(), [
                'battle_id' => $battle_id,
            ]);
            return response()->json([
                'message' => 'Failed to fetch battle status.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
