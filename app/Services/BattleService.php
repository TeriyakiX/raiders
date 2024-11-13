<?php

namespace App\Services;

use App\Http\Resources\CardResource\CardResourceShow;
use App\Models\Battle;
use App\Models\BattleLog;
use App\Models\BattleRule;
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
        try {
            $attacker = User::find($attacker_id);
            $defender = User::find($defender_id);

            if (!$attacker || !$defender) {
                Log::error('Attacker or Defender not found', [
                    'attacker_id' => $attacker_id,
                    'defender_id' => $defender_id
                ]);
                throw new Exception("Attacker or Defender not found");
            }

            $attackerSquad = Squad::where('user_id', $attacker_id)
                ->where('event_id', $event_id)
                ->with('card')
                ->get()
                ->pluck('card')
                ->unique('id')
                ->filter(function ($card) {
                    return !$card->frozen_until || $card->frozen_until < now();
                }) // Убираем замороженные карты
                ->sortByDesc(function ($card) {
                    return $this->getCardInitiative($card);
                })
                ->take(4); // Берем максимум 4 карты
            $defenderSquad = Squad::where('user_id', $defender_id)
                ->where('event_id', $event_id)
                ->with('card')
                ->get()
                ->pluck('card')
                ->unique('id')
                ->filter(function ($card) {
                    return !$card->frozen_until || $card->frozen_until < now();
                }) // Убираем замороженные карты
                ->sortByDesc(function ($card) {
                    return $this->getCardInitiative($card);
                })
                ->take($attackerSquad->count()); // Даем защитнику столько карт, сколько у атакующего

            // Проверяем, что после фильтрации остались карты для боя
            if ($attackerSquad->isEmpty() || $defenderSquad->isEmpty()) {
                Log::error('No available cards for battle after filtering frozen cards.', [
                    'attacker_id' => $attacker_id,
                    'defender_id' => $defender_id
                ]);
                throw new Exception("No available cards for one or both users.");
            }

            // Логика определения правил и создания записи боя
            $levelDifference = $attacker->league_id - $defender->league_id;
            $battleRule = BattleRule::where('level_difference', $levelDifference)->first();
            if (!$battleRule) {
                Log::error('Battle rule not found for level difference', [
                    'level_difference' => $levelDifference
                ]);
                throw new Exception("Battle rule not found");
            }

            $battle = Battle::create([
                'attacker_id' => $attacker_id,
                'defender_id' => $defender_id,
                'attacker_initial_cups' => $attacker->cups,
                'defender_initial_cups' => $defender->cups,
                'event_id' => $event_id,
                'status' => 'in_progress',
            ]);

            $attackerWins = 0;
            $defenderWins = 0;
            $battleLog = [];

            // Проходим по доступным картам и проводим раунды
            foreach (range(0, min($attackerSquad->count(), $defenderSquad->count()) - 1) as $i) {
                $attackerCard = $attackerSquad[$i];
                $defenderCard = $defenderSquad[$i];

                $attackerParams = $this->getCharacterParameters($attackerCard);
                $defenderParams = $this->getCharacterParameters($defenderCard);

                $attackerScore = $attackerParams->damage_numeric + $attackerParams->shield_numeric + $attackerParams->health_numeric;
                $defenderScore = $defenderParams->damage_numeric + $defenderParams->shield_numeric + $defenderParams->health_numeric;

                $roundResult = [
                    'round' => $i + 1,
                    'attacker_card' => (new CardResourceShow($attackerCard))->toArray(request()),
                    'defender_card' => (new CardResourceShow($defenderCard))->toArray(request()),
                    'result' => $attackerScore > $defenderScore ? 'Attacker wins' : ($attackerScore < $defenderScore ? 'Defender wins' : 'Draw')
                ];

                BattleLog::create([
                    'battle_id' => $battle->id,
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
                    $defenderCard->update(['frozen_until' => now()->addSeconds($battleRule->victim_frozen_duration)]);
                } elseif ($defenderScore > $attackerScore) {
                    $defenderWins++;
                    $attackerCard->update(['frozen_until' => now()->addSeconds($battleRule->attacker_frozen_duration)]);
                }
            }

            // Подсчет побед и изменение кубков на основе правил из battleRule
            $attackerChange = 0;
            $defenderChange = 0;

            if ($attackerWins > $defenderWins) {
                $attackerChange = $battleRule->attacker_win_cups;
                $defenderChange = $battleRule->victim_lose_cups;
            } elseif ($defenderWins > $attackerWins) {
                $defenderChange = $battleRule->victim_win_cups;
                $attackerChange = $battleRule->attacker_lose_cups;
            }

            // Применяем изменения кубков
            $attacker->increment('cups', $attackerChange);
            $defender->increment('cups', $defenderChange);

            // Завершаем бой
            $battle->update([
                'attacker_final_cups' => $attacker->cups,
                'defender_final_cups' => $defender->cups,
                'status' => 'completed',
            ]);

            return $battle;

        } catch (Exception $e) {
            Log::error('Error during battle start', [
                'attacker_id' => $attacker_id,
                'defender_id' => $defender_id,
                'event_id' => $event_id,
                'exception' => $e->getMessage()
            ]);

            return null;
        }
    }

    public function performBattle($battle_id)
    {
        Log::info("Performing battle with ID: $battle_id");

        $battle = Battle::find($battle_id);

        if (!$battle) {
            Log::error("Battle not found with ID: $battle_id");
            return ['error' => 'Battle not found'];
        }

        $initialAttackerCups = $battle->attacker_initial_cups;
        $initialDefenderCups = $battle->defender_initial_cups;
        $attackerFinalCups = $battle->attacker_final_cups;
        $defenderFinalCups = $battle->defender_final_cups;

        $attackerCupsChange = $attackerFinalCups - $initialAttackerCups;
        $defenderCupsChange = $defenderFinalCups - $initialDefenderCups;

        $rounds = BattleLog::where('battle_id', $battle_id)->get();

        if ($rounds->isEmpty()) {
            Log::error("No rounds found for battle with ID: $battle_id");
            return ['error' => 'No rounds found for this battle.'];
        }

        $roundsInfo = $rounds->map(function ($round) {
            return [
                'round' => $round->round,
                'attacker_card' => new CardResourceShow($round->attacker_card),
                'defender_card' => new CardResourceShow($round->defender_card),
                'result' => $round->result,
            ];
        });

        // Подсчет времени заморозки для атакующего и защищающегося
        $attackerFrozenUntil = optional($battle->attacker)->frozen_until;
        $defenderFrozenUntil = optional($battle->defender)->frozen_until;

        $attackerFrozenInfo = $this->getFrozenTimeInfo($attackerFrozenUntil);
        $defenderFrozenInfo = $this->getFrozenTimeInfo($defenderFrozenUntil);

        $battleInfo = [
            'battle' => [
                'id' => $battle->id,
                'attacker_id' => $battle->attacker_id,
                'defender_id' => $battle->defender_id,
                'attacker_initial_cups' => $initialAttackerCups,
                'defender_initial_cups' => $initialDefenderCups,
                'attacker_final_cups' => $attackerFinalCups,
                'defender_final_cups' => $defenderFinalCups,
                'event_id' => $battle->event_id,
                'status' => $battle->status,
                'created_at' => $battle->created_at,
                'updated_at' => $battle->updated_at,
            ],
            'attacker' => [
                'id' => $battle->attacker_id,
                'name' => optional($battle->attacker)->name,
                'cups' => $attackerFinalCups,
                'cups_change' => $attackerCupsChange > 0 ? "+$attackerCupsChange" : $attackerCupsChange,
                'frozen_until' => optional($attackerFrozenUntil)->format('Y-m-d H:i:s'),
                'frozen_status' => $attackerFrozenInfo['status'],
                'frozen_time' => $attackerFrozenInfo['remaining_time'],
            ],
            'defender' => [
                'id' => $battle->defender_id,
                'name' => optional($battle->defender)->name,
                'cups' => $defenderFinalCups,
                'cups_change' => $defenderCupsChange > 0 ? "+$defenderCupsChange" : $defenderCupsChange,
                'frozen_until' => optional($defenderFrozenUntil)->format('Y-m-d H:i:s'),
                'frozen_status' => $defenderFrozenInfo['status'],
                'frozen_time' => $defenderFrozenInfo['remaining_time'],
            ],
            'rounds' => $roundsInfo,
        ];

        return $battleInfo;
    }

    public function getFrozenTimeInfo($frozenUntil)
    {
        if ($frozenUntil) {
            $now = Carbon::now();
            $frozenUntil = Carbon::parse($frozenUntil);
            $remainingTime = $now->diff($frozenUntil);

            if ($now->lt($frozenUntil)) {
                return [
                    'status' => 'Frozen',
                    'remaining_time' => $remainingTime->format('%d days %h hours %i minutes %s seconds')
                ];
            } else {
                return [
                    'status' => 'Available',
                    'remaining_time' => '0 minutes 0 seconds'
                ];
            }
        } else {
            return [
                'status' => 'Available',
                'remaining_time' => '0 minutes 0 seconds'
            ];
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
