<?php

namespace App\Services;

use App\Http\Resources\CardResource\CardResourceShow;
use App\Models\Battle;
use App\Models\Card;
use App\Models\Squad;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
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

    public function getInitialCups($userId)
    {
        $user = User::find($userId);
        return $user ? $user->league_points : 0;
    }


    public function getBattleStatus(Battle $battle)
    {
        try {
            // Получаем пользователей-атакующего и защищающегося
            $attacker = $battle->attacker;
            $defender = $battle->defender;

            // Получаем карточки в отряде атакующего и защищающегося
            $attackerSquad = Squad::where('user_id', $attacker->id)->get();
            $defenderSquad = Squad::where('user_id', $defender->id)->get();

            // Формируем ответ с использованием CardResourceShow
            return [
                'id' => $battle->id,
                'attacker_id' => $battle->attacker_id,
                'defender_id' => $battle->defender_id,
                'status' => $battle->status,
                'attacker_league_points' => $attacker->league_points,
                'defender_league_points' => $defender->league_points,
                'participants' => [
                    'attacker' => [
                        'cards' => $attackerSquad->map(function ($squad) {
                            $card = Card::find($squad->card_id);
                            return $card ? new CardResourceShow($card) : null;
                        })->filter()->values()->toArray(), // Отфильтровываем null значения
                    ],
                    'defender' => [
                        'cards' => $defenderSquad->map(function ($squad) {
                            $card = Card::find($squad->card_id);
                            return $card ? new CardResourceShow($card) : null;
                        })->filter()->values()->toArray(), // Отфильтровываем null значения
                    ],
                ],
            ];
        } catch (\Exception $e) {
            Log::error("Failed to get battle status: " . $e->getMessage(), [
                'exception' => $e,
                'battle_id' => $battle->id,
            ]);
            throw $e;
        }
    }

    public function performBattle(Battle $battle, array $actions)
    {
        try {
            // Логируем входные данные
            Log::info('Performing battle', [
                'battle_id' => $battle->id,
                'actions' => $actions
            ]);

            // Получаем карточки для атакующего и защищающегося
            $attackerSquad = Squad::where('user_id', $battle->attacker_id)->with('card')->get();
            $defenderSquad = Squad::where('user_id', $battle->defender_id)->with('card')->get();

            // Извлекаем карточки
            $attackerCards = $attackerSquad->pluck('card')->toArray();
            $defenderCards = $defenderSquad->pluck('card')->toArray();

            // Получаем результаты боя
            $battleResults = $this->calculateBattleResults($attackerCards, $defenderCards);

            // Убедитесь, что ключ 'results' существует в результате
            if (!isset($battleResults['results'])) {
                throw new \Exception('Results key is missing in battle results.');
            }

            // Обновляем очки лиги
            $this->updateLeaguePoints($battle->attacker, $battle->defender, $battleResults['attacker_points'], $battleResults['defender_points']);

            // Замораживаем карты
            $this->freezeCards($attackerSquad->pluck('card'), $defenderSquad->pluck('card'), $battleResults['results']);

            // Обновляем состояние боя
            $battle->status = 'completed';
            $battle->save();

            // Возвращаем результаты
            return [
                'results' => $battleResults['results'],
                'final_status' => [
                    'attacker_league_points' => $battle->attacker->league_points,
                    'defender_league_points' => $battle->defender->league_points,
                    'attacker_league' => $this->getLeague($battle->attacker->league_points),
                    'defender_league' => $this->getLeague($battle->defender->league_points)
                ]
            ];
        } catch (\Exception $e) {
            // Логируем ошибку
            Log::error('Failed to perform battle', [
                'exception' => $e,
                'battle_id' => $battle->id,
                'actions' => $actions
            ]);
            return [
                'message' => 'Failed to perform battle.'
            ];
        }
    }

    public function calculateBattleResults($attackerCards, $defenderCards)
    {
        // Пример обработки данных
        $results = [];

        // Обрабатываем каждую карту
        foreach ($attackerCards as $attackerCard) {
            foreach ($defenderCards as $defenderCard) {
                // Убедитесь, что вы работаете с объектами, а не с массивами
                if (is_array($attackerCard)) {
                    // Преобразуйте массив в объект, если необходимо
                    $attackerCard = (object)$attackerCard;
                }
                if (is_array($defenderCard)) {
                    // Преобразуйте массив в объект, если необходимо
                    $defenderCard = (object)$defenderCard;
                }

                // Проверяем наличие свойства 'fraction'
                if (isset($attackerCard->fraction) && isset($defenderCard->fraction)) {
                    // Ваш код для вычисления результата боя
                } else {
                    throw new \Exception('One or more cards do not have a fraction property.');
                }
            }
        }

        // Верните результат с ключом 'results'
        return ['results' => $results];
    }

    protected function updateLeaguePoints($attacker, $defender, $attackerPoints, $defenderPoints)
    {
        DB::transaction(function () use ($attacker, $defender, $attackerPoints, $defenderPoints) {
            $attacker->league_points += $attackerPoints;
            $defender->league_points += $defenderPoints;

            $attacker->save();
            $defender->save();
        });
    }

    protected function freezeCards($attackerCards, $defenderCards, $results)
    {
        $now = Carbon::now();
        foreach ($results as $result) {
            $attackerCard = $attackerCards->firstWhere('id', $result['attacker_card_id']);
            $defenderCard = $defenderCards->firstWhere('id', $result['defender_card_id']);

            if ($result['result'] === 'attacker_wins') {
                $defenderCard->update(['frozen_until' => $now->addSeconds($this->freezeDuration)]);
            } elseif ($result['result'] === 'defender_wins') {
                $attackerCard->update(['frozen_until' => $now->addSeconds($this->freezeDuration)]);
            }
        }
    }

    protected function getLeague($leaguePoints)
    {
        // Реальная логика для определения лиги на основе очков лиги
        $league = DB::table('leagues')
            ->where('cups_from', '<=', $leaguePoints)
            ->where('cups_to', '>=', $leaguePoints)
            ->first();

        return $league ? $league->name : 'Unranked';
    }

    public function getBattleLogs(Battle $battle)
    {
        // Логика получения логов боя
        $logs = BattleLog::where('battle_id', $battle->id)->get();

        return [
            'battle_id' => $battle->id,
            'logs' => $logs->map(function ($log) {
                return [
                    'round' => $log->round,
                    'attacker_card_id' => $log->attacker_card_id,
                    'defender_card_id' => $log->defender_card_id,
                    'result' => $log->result,
                ];
            })->toArray(),
        ];
    }
}
