<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource\CardResourceShow;
use App\Models\Battle;
use App\Models\BattleLog;
use App\Models\Card;
use App\Models\Squad;
use App\Models\User;
use App\Services\BattleService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BattleController extends Controller
{
    protected $userService;
    protected $battleService;

    public function __construct(UserService $userService, BattleService $battleService)
    {
        $this->userService = $userService;
        $this->battleService = $battleService;
    }

    public function startBattle(Request $request)
    {
        try {
            $accessToken = $request->cookie('access_token');

            if (!$accessToken) {
                Log::error("Access token is missing or invalid.");
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Получение данных пользователя
            $userDataResponse = $this->userService->getUserData($accessToken);
            Log::info('User data fetched: ' . json_encode($userDataResponse));

            if (!isset($userDataResponse['data']['id'])) {
                Log::error("User data fetch failed: " . json_encode($userDataResponse));
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            $attackerExternalId = $userDataResponse['data']['id'];
            $attacker = User::where('external_id', $attackerExternalId)->first();

            if (!$attacker) {
                Log::error("Attacker not found for ID: $attackerExternalId");
                return response()->json(['message' => 'User not found'], 404);
            }

            // Логирование данных атакующего и защитника
            $eventId = $request->input('event_id');
            $defenderId = $request->input('defender_id');

            Log::info("Attacker ID: $attacker->id, Defender ID: $defenderId, Event ID: $eventId");

            if (!$eventId) {
                Log::error("Event ID is missing");
                return response()->json(['message' => 'Event ID is required'], 400);
            }

            if (!$defenderId || $defenderId == $attacker->id) {
                return response()->json(['message' => 'Invalid defender ID or cannot attack yourself'], 400);
            }

            $defender = User::find($defenderId);
            if (!$defender) {
                return response()->json(['message' => 'Defender not found'], 404);
            }

            // Проверка отрядов
            if ($this->checkSquadSize($attacker->id, $eventId) < 3) {
                return response()->json(['message' => 'You need at least 3 cards in your squad'], 400);
            }
            if ($this->checkSquadSize($defender->id, $eventId) < 3) {
                return response()->json(['message' => 'The defender needs at least 3 cards'], 400);
            }

            // Запуск битвы
            $battle = $this->battleService->startBattle($attacker->id, $defender->id, $eventId);

            if ($battle && isset($battle->id)) {
                Log::info("Battle started successfully: Battle ID - " . $battle->id);
                return response()->json(['message' => 'Battle started successfully', 'battle_id' => $battle->id]);
            } else {
                Log::error("Battle creation failed");
                return response()->json(['message' => 'Failed to start battle'], 500);
            }

        } catch (\Exception $e) {
            Log::error("Failed to start battle: " . $e->getMessage(), [
                'exception' => $e,
                'attacker_id' => $attacker->id ?? 'N/A',
                'defender_id' => $defenderId ?? 'N/A',
                'event_id' => $eventId ?? 'N/A',
            ]);

            return response()->json(['message' => 'Failed to start battle.'], 500);
        }
    }
    private function checkSquadSize($userId, $eventId)
    {
        $squadSize = Squad::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->count();

        return $squadSize;
    }

// Проверка замороженных карт
    private function checkFrozenCards($userId, $eventId, $role)
    {
        $squad = Squad::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->with('card')
            ->get();

        foreach ($squad as $squadMember) {
            if ($squadMember->card->frozen_until && $squadMember->card->frozen_until > now()) {
                throw new Exception(
                    json_encode([
                        "{$role}_card" => [
                            'id' => $squadMember->card->id,
                            'frozen_until' => $squadMember->card->frozen_until,
                            'is_frozen' => true
                        ]
                    ])
                );
            }
        }
    }

    public function completeBattle(Request $request, $battle_id)
    {
        $battleResult = $this->battleService->performBattle($battle_id);

        if (isset($battleResult['error'])) {
            return response()->json([
                'message' => 'Failed to complete battle.',
                'error' => $battleResult['error']
            ], 500);
        }

        return response()->json([
            'message' => 'Battle completed successfully.',
            'battle_info' => $battleResult
        ]);
    }
    public function getBattleStatus($battle_id)
    {
        try {
            $battleStatus = $this->battleService->getBattleStatus($battle_id);
            return response()->json($battleStatus);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch battle status.'], 500);
        }
    }

    public function getBattleLogs($battleId)
    {
        $battleLog = $this->battleService->generateBattleLog($battleId);

        return response()->json($battleLog);
    }
}
