<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource\CardResourceShow;
use App\Models\Battle;
use App\Models\Squad;
use App\Models\User;
use App\Services\BattleService;
use App\Services\UserService;
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
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $userDataResponse = $this->userService->getUserData($accessToken);

            if (!isset($userDataResponse['data']['id'])) {
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            $attackerExternalId = $userDataResponse['data']['id'];

            $attacker = User::where('external_id', $attackerExternalId)->first();

            if (!$attacker) {
                return response()->json(['message' => 'User not found'], 404);
            }

            $eventId = $request->input('event_id');

            if (!$eventId) {
                return response()->json(['message' => 'Event ID is required'], 400);
            }

            $defenderId = $request->input('defender_id');

            if (!$defenderId || $defenderId == $attacker->id) {
                return response()->json(['message' => 'Invalid defender ID or cannot attack yourself'], 400);
            }

            $defender = User::find($defenderId);

            if (!$defender) {
                return response()->json(['message' => 'Defender not found'], 404);
            }

            $attackerSquadCardsCount = Squad::where('user_id', $attacker->id)
                ->where('event_id', $eventId)
                ->count();
            if ($attackerSquadCardsCount < 3) {
                return response()->json(['message' => 'You need at least 3 cards in your squad for this event to start a battle'], 400);
            }

            $defenderSquadCardsCount = Squad::where('user_id', $defender->id)
                ->where('event_id', $eventId)
                ->count();
            if ($defenderSquadCardsCount < 3) {
                return response()->json(['message' => 'The defender needs at least 3 cards in their squad for this event to start a battle'], 400);
            }

            $battle = $this->battleService->startBattle($attacker->id, $defender->id, $eventId);

            return response()->json(['message' => 'Battle started successfully', 'battle_id' => $battle->id]);
        } catch (\Exception $e) {
            Log::error("Failed to start battle: " . $e->getMessage(), [
                'exception' => $e,
                'attacker_id' => $attacker->id ?? 'N/A',
                'defender_id' => $defenderId ?? 'N/A',
                'event_id' => $eventId ?? 'N/A',
            ]);

            $errorMessage = $e->getMessage();

            if (strpos($errorMessage, 'attacker_card') !== false || strpos($errorMessage, 'defender_card') !== false) {
                return response()->json([
                    'message' => 'Failed to start battle. Card is frozen.',
                    'card_info' => json_decode($errorMessage)  // Декодируем JSON и передаем в ответ
                ], 400);
            }

            return response()->json(['message' => 'Failed to start battle.'], 500);
        }
    }

    public function completeBattle(Request $request, $battle_id)
    {
        try {
            $battleResult = $this->battleService->performBattle($battle_id);

            if (isset($battleResult['error'])) {
                return response()->json([
                    'message' => 'Failed to complete battle.',
                    'error' => $battleResult['error']
                ], 500);
            }

            return response()->json([
                'message' => 'Battle completed successfully.',
                'battle_result' => $battleResult
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to complete battle: " . $e->getMessage(), [
                'battle_id' => $battle_id,
                'exception' => $e
            ]);

            return response()->json([
                'message' => 'Failed to complete battle.',
                'error' => $e->getMessage()
            ], 500);
        }
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
