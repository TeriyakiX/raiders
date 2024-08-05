<?php

namespace App\Services;

use App\Http\Resources\CardResource\CardResourceShow;
use App\Models\Battle;
use App\Models\Card;
use App\Models\CharacterParameters;
use App\Models\Squad;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BattleService
{
    protected $fractionModifiers = [
        'Primals' => ['Primals' => 1, 'Джентльмены' => 0.5, 'Безупречные' => 1, 'Гиены' => 1, 'Валькирии' => 0.5],
        'Джентльмены' => ['Primals' => 0.5, 'Джентльмены' => 1, 'Безупречные' => 1, 'Гиены' => 0.5, 'Валькирии' => 1],
        'Безупречные' => ['Primals' => 1, 'Джентльмены' => 1, 'Безупречные' => 1, 'Гиены' => 0.5, 'Валькирии' => 0.5],
        'Гиены' => ['Primals' => 1, 'Джентльмены' => 0.5, 'Безупречные' => 0.5, 'Гиены' => 1, 'Валькирии' => 1],
        'Валькирии' => ['Primals' => 0.5, 'Джентльмены' => 1, 'Безупречные' => 0.5, 'Гиены' => 1, 'Валькирии' => 1],
        'Outcasts' => ['Город' => 0.5, 'Деревня' => 1.5],
    ];
    protected $terrainModifiers = [
        'Город' => ['Primals' => 1, 'Джентльмены' => 1, 'Безупречные' => 1, 'Гиены' => 1, 'Валькирии' => 1, 'Outcasts' => 0.5],
        'Деревня' => ['Primals' => 1, 'Джентльмены' => 1, 'Безупречные' => 1, 'Гиены' => 1, 'Валькирии' => 1, 'Outcasts' => 1.5],
    ];

    protected $freezeDuration = 300; // Заморозка на 5 минут (300 секунд)

    protected $userService;
    protected $cardService;

    public function __construct(UserService $userService, CardService $cardService)
    {
        $this->userService = $userService;
        $this->cardService = $cardService;
    }

    public function startBattle($attacker_id, $defender_id)
    {
        try {
            // Проверка существования пользователей
            $attacker = User::find($attacker_id);
            $defender = User::find($defender_id);

            if (!$attacker || !$defender) {
                throw new \Exception("Attacker or Defender not found");
            }

            // Создание записи о бое
            return Battle::create([
                'attacker_id' => $attacker_id,
                'defender_id' => $defender_id,
                'attacker_initial_cups' => $attacker->league_points,
                'defender_initial_cups' => $defender->league_points,
                'status' => 'in_progress', // Убедитесь, что это одно из допустимых значений
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to start battle: " . $e->getMessage(), [
                'attacker_id' => $attacker_id,
                'defender_id' => $defender_id,
            ]);
            throw $e; // Или вернуть ошибку для обработчика
        }
    }

    public function performBattle($battle_id)
    {
        try {
            // Получение информации о бое
            $battle = Battle::findOrFail($battle_id);
            Log::info("Battle found: ", $battle->toArray());

            // Получение отрядов для атакующего и защищающегося
            $attackerSquad = Squad::where('user_id', $battle->attacker_id)->with('card')->get();
            $defenderSquad = Squad::where('user_id', $battle->defender_id)->with('card')->get();
            Log::info("Attacker squad: ", $attackerSquad->toArray());
            Log::info("Defender squad: ", $defenderSquad->toArray());

            // Извлечение карточек
            $attackerCards = $attackerSquad->pluck('card')->toArray();
            $defenderCards = $defenderSquad->pluck('card')->toArray();

            if (empty($attackerCards) || empty($defenderCards)) {
                throw new \Exception("Один из игроков не имеет карт в отряде.");
            }

            // Сортировка карт по инициативе
            usort($attackerCards, function ($a, $b) {
                return $this->getCardInitiative($a) < $this->getCardInitiative($b) ? 1 : -1;
            });

            usort($defenderCards, function ($a, $b) {
                return $this->getCardInitiative($a) < $this->getCardInitiative($b) ? 1 : -1;
            });

            Log::info("Sorted attacker cards: ", $attackerCards);
            Log::info("Sorted defender cards: ", $defenderCards);

            // Проведение боя по раундам
            $rounds = min(count($attackerCards), count($defenderCards));
            $attackerWins = 0;
            $defenderWins = 0;

            for ($i = 0; $i < $rounds; $i++) {
                $attackerCard = $attackerCards[$i];
                $defenderCard = $defenderCards[$i];

                $attackerParams = $this->getCharacterParameters($attackerCard);
                $defenderParams = $this->getCharacterParameters($defenderCard);

                Log::info("Attacker card parameters: ", $attackerParams->toArray());
                Log::info("Defender card parameters: ", $defenderParams->toArray());

                $attackerScore = $attackerParams->damage_numeric + $attackerParams->shield_numeric + $attackerParams->health_numeric;
                $defenderScore = $defenderParams->damage_numeric + $defenderParams->shield_numeric + $defenderParams->health_numeric;

                Log::info("Comparing cards: ", [
                    'attacker_card' => [
                        'id' => $attackerCard['id'],
                        'damage' => $attackerParams->damage_numeric,
                        'shield' => $attackerParams->shield_numeric,
                        'health' => $attackerParams->health_numeric,
                        'total' => $attackerScore
                    ],
                    'defender_card' => [
                        'id' => $defenderCard['id'],
                        'damage' => $defenderParams->damage_numeric,
                        'shield' => $defenderParams->shield_numeric,
                        'health' => $defenderParams->health_numeric,
                        'total' => $defenderScore
                    ],
                    'result' => $attackerScore > $defenderScore ? 'Attacker wins' : ($attackerScore < $defenderScore ? 'Defender wins' : 'Draw')
                ]);

                if ($attackerScore > $defenderScore) {
                    // Атакующая карта выигрывает
                    $this->updateCardStatus($attackerCard['id'], 'active');
                    $this->updateCardStatus($defenderCard['id'], 'frozen');
                    $attackerWins++;
                    Log::info("Round result: Attacker wins", [
                        'attacker_card_id' => $attackerCard['id'],
                        'defender_card_id' => $defenderCard['id']
                    ]);
                } else {
                    // Защитная карта выигрывает или ничья
                    $this->updateCardStatus($attackerCard['id'], 'frozen');
                    $this->updateCardStatus($defenderCard['id'], 'active');
                    $defenderWins++;
                    Log::info("Round result: Defender wins or draw", [
                        'attacker_card_id' => $attackerCard['id'],
                        'defender_card_id' => $defenderCard['id']
                    ]);
                }
            }

            // Обновление статуса боя и запись результатов
            $battle->status = 'completed';
            $battle->attacker_final_cups = $attackerWins;
            $battle->defender_final_cups = $defenderWins;
            $battle->save();

            Log::info("Battle completed and updated: ", [
                'battle' => $battle->toArray(),
                'attacker_wins' => $attackerWins,
                'defender_wins' => $defenderWins
            ]);

        } catch (\Exception $e) {
            Log::error("Failed to perform battle: " . $e->getMessage(), [
                'battle_id' => $battle_id,
                'exception' => $e
            ]);
            throw $e;
        }
    }

    protected function compareCards($attackerCard, $defenderCard)
    {
        $attackerParams = $this->getCharacterParameters($attackerCard);
        $defenderParams = $this->getCharacterParameters($defenderCard);

        $attackerScore = $attackerParams->damage_numeric + $attackerParams->shield_numeric + $attackerParams->health_numeric;
        $defenderScore = $defenderParams->damage_numeric + $defenderParams->shield_numeric + $defenderParams->health_numeric;

        if ($attackerScore > $defenderScore) {
            return 1; // Атакующая карта выигрывает
        } elseif ($attackerScore < $defenderScore) {
            return -1; // Защитная карта выигрывает
        }
        return 0; // В случае ничьи
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
        // Проверяем тип данных и преобразуем в объект, если это массив
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
                    // Преобразуем каждый атрибут в объект, если это массив
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

    private function updateCardStatus($cardId, $status)
    {
        // Пример логики обновления статуса карты
        $card = Card::findOrFail($cardId);
        $card->status = $status;
        if ($status == 'frozen') {
            $card->frozen_until = now()->addMinute(); // Заморозка на 1 минуту
        } else {
            $card->frozen_until = null;
        }
        $card->save();
    }

    protected function getCardInitiative($card)
    {
        $characterParams = $this->getCharacterParameters($card);
        return $characterParams ? $characterParams->initiative_numeric : 0;
    }

    public function generateBattleLog($battle_id)
    {
        try {
            $battleLog = [];
            // Получение информации о бое
            $battle = Battle::findOrFail($battle_id);
            $battleLog['battle'] = $battle->toArray();

            // Получение отрядов для атакующего и защищающегося
            $attackerSquad = Squad::where('user_id', $battle->attacker_id)->with('card')->get();
            $defenderSquad = Squad::where('user_id', $battle->defender_id)->with('card')->get();

            // Извлечение карточек
            $attackerCards = $attackerSquad->pluck('card');
            $defenderCards = $defenderSquad->pluck('card');

            // Сортировка карт по инициативе
            $attackerCards = $attackerCards->sortByDesc(function ($card) {
                return $this->getCardInitiative($card);
            });
            $defenderCards = $defenderCards->sortByDesc(function ($card) {
                return $this->getCardInitiative($card);
            });

            // Проведение боя по раундам
            $rounds = min($attackerCards->count(), $defenderCards->count());
            $attackerWins = 0;
            $defenderWins = 0;

            for ($i = 0; $i < $rounds; $i++) {
                $attackerCard = $attackerCards[$i];
                $defenderCard = $defenderCards[$i];

                $attackerParams = $this->getCharacterParameters($attackerCard);
                $defenderParams = $this->getCharacterParameters($defenderCard);

                $attackerScore = $attackerParams->damage_numeric + $attackerParams->shield_numeric + $attackerParams->health_numeric;
                $defenderScore = $defenderParams->damage_numeric + $defenderParams->shield_numeric + $defenderParams->health_numeric;

                $roundLog = [
                    'round' => $i + 1,
                    'attacker_card' => (new CardResourceShow($attackerCard))->toArray(request()),
                    'defender_card' => (new CardResourceShow($defenderCard))->toArray(request()),
                    'result' => $attackerScore > $defenderScore ? 'Attacker wins' : ($attackerScore < $defenderScore ? 'Defender wins' : 'Draw')
                ];

                if ($attackerScore > $defenderScore) {
                    // Атакующая карта выигрывает
                    $this->updateCardStatus($attackerCard->id, 'active');
                    $this->updateCardStatus($defenderCard->id, 'frozen');
                    $attackerWins++;
                } else {
                    // Защитная карта выигрывает или ничья
                    $this->updateCardStatus($attackerCard->id, 'frozen');
                    $this->updateCardStatus($defenderCard->id, 'active');
                    $defenderWins++;
                }

                $battleLog['rounds'][] = $roundLog;
            }

            // Обновление статуса боя и запись результатов
            $battle->status = 'completed';
            $battle->attacker_final_cups = $attackerWins;
            $battle->defender_final_cups = $defenderWins;
            $battle->save();

            return $battleLog;
        } catch (\Exception $e) {
            Log::error("Failed to generate battle log: " . $e->getMessage(), [
                'battle_id' => $battle_id,
                'exception' => $e
            ]);
            throw $e;
        }
    }

    public function getBattleStatus($battle_id)
    {
        try {
            // Получение информации о бое
            $battle = Battle::findOrFail($battle_id);

            // Получение отрядов для атакующего и защищающегося
            $attackerSquad = Squad::where('user_id', $battle->attacker_id)
                ->with('card')
                ->get();
            $defenderSquad = Squad::where('user_id', $battle->defender_id)
                ->with('card')
                ->get();

            // Преобразование карточек в нужный формат
            $attackerCards = $attackerSquad->map(function ($squad) {
                return new CardResourceShow($squad->card);
            });

            $defenderCards = $defenderSquad->map(function ($squad) {
                return new CardResourceShow($squad->card);
            });

            // Формирование ответа
            $response = [
                'battle' => $battle->toArray(),
                'attacker_squad' => $attackerCards->toArray(),
                'defender_squad' => $defenderCards->toArray(),
            ];

            return $response;

        } catch (\Exception $e) {
            Log::error("Failed to fetch battle status: " . $e->getMessage(), [
                'battle_id' => $battle_id,
            ]);
            throw $e;
        }
    }

}
