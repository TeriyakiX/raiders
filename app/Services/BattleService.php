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
                ->get();
            $defenderSquad = Squad::where('user_id', $defender_id)
                ->where('event_id', $event_id)
                ->with('card')
                ->get();

            if ($attackerSquad->isEmpty() || $defenderSquad->isEmpty()) {
                Log::error('Squad is empty', [
                    'attacker_id' => $attacker_id,
                    'defender_id' => $defender_id,
                    'attacker_squad_count' => $attackerSquad->count(),
                    'defender_squad_count' => $defenderSquad->count()
                ]);
                throw new Exception("One or both squads are empty.");
            }

            // Создание нового боя
            $battle = Battle::create([
                'attacker_id' => $attacker_id,
                'defender_id' => $defender_id,
                'attacker_initial_cups' => $attacker->cups,
                'defender_initial_cups' => $defender->cups,
                'event_id' => $event_id,
                'status' => 'in_progress',
            ]);

            Log::info('Battle created successfully', ['battle_id' => $battle->id]);

            // Подсчет кубков и проведение раундов
            $attackerWins = 0;
            $defenderWins = 0;
            $battleLog = [];

            // Сортировка карт по инициативе
            $attackerCards = $attackerSquad->pluck('card')->unique('id')->values();
            $defenderCards = $defenderSquad->pluck('card')->unique('id')->values();

            $attackerCards = $attackerCards->sortByDesc(function ($card) {
                return $this->getCardInitiative($card);
            });
            $defenderCards = $defenderCards->sortByDesc(function ($card) {
                return $this->getCardInitiative($card);
            });

            $rounds = min(count($attackerCards), count($defenderCards));

            foreach (range(0, $rounds - 1) as $i) {
                $attackerCard = $attackerCards[$i];
                $defenderCard = $defenderCards[$i];

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

                Log::info("Round " . ($i + 1) . ": " . $roundResult['result'], [
                    'attacker_card' => $attackerCard->id,
                    'defender_card' => $defenderCard->id,
                    'attacker_score' => $attackerScore,
                    'defender_score' => $defenderScore,
                    'result' => $roundResult['result']
                ]);

                $battleLog[] = $roundResult;

                if ($attackerScore > $defenderScore) {
                    $attackerWins++;
                } else {
                    $defenderWins++;
                }
            }

            // Подсчет кубков
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

            $attackerUser->increment('cups', $attackerChange);
            $defenderUser->increment('cups', $defenderChange);

            $battle->update([
                'attacker_final_cups' => $attackerUser->cups,
                'defender_final_cups' => $defenderUser->cups,
                'status' => 'completed',
            ]);

            Log::info("Battle completed successfully.", [
                'battle_id' => $battle->id,
                'attacker_final_cups' => $attackerUser->cups,
                'defender_final_cups' => $defenderUser->cups
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

        // Получаем информацию о битве
        $battle = Battle::find($battle_id);

        // Проверка на наличие битвы
        if (!$battle) {
            Log::error("Battle not found with ID: $battle_id");
            return ['error' => 'Battle not found'];
        }

        // Получаем информацию о раундах из таблицы BattleLog
        $rounds = BattleLog::where('battle_id', $battle_id)->get();

        // Если раунды не найдены
        if ($rounds->isEmpty()) {
            Log::error("No rounds found for battle with ID: $battle_id");
            return ['error' => 'No rounds found for this battle.'];
        }

        // Массив для хранения информации о каждом раунде
        $roundsInfo = $rounds->map(function ($round) {
            return [
                'round' => $round->round,
                'attacker_card_id' => $round->attacker_card_id,
                'defender_card_id' => $round->defender_card_id,
                'result' => $round->result,
            ];
        });

        // Получаем информацию о пользователях
        $attackerUser = User::find($battle->attacker_id);
        $defenderUser = User::find($battle->defender_id);

        // Проверка наличия пользователей
        if (!$attackerUser || !$defenderUser) {
            Log::error("Attacker or Defender not found for battle ID: $battle_id");
            return ['error' => 'Attacker or Defender not found'];
        }

        // Формируем финальную информацию о битве
        $battleInfo = [
            'battle_id' => $battle->id,
            'status' => $battle->status,
            'attacker' => [
                'id' => $attackerUser->id,
                'cups' => $attackerUser->cups,
                'name' => $attackerUser->name,
            ],
            'defender' => [
                'id' => $defenderUser->id,
                'cups' => $defenderUser->cups,
                'name' => $defenderUser->name,
            ],
            'rounds' => $roundsInfo,
        ];

        // Обновляем статус битвы на 'completed'
        $battle->status = 'completed';
        $battle->save();

        return $battleInfo;
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
