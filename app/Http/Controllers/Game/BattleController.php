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
            // Получаем access_token из куки
            $accessToken = $request->cookie('access_token');

            if (!$accessToken) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Получаем данные пользователя с помощью UserService
            $userDataResponse = $this->userService->getUserData($accessToken);

            if (!isset($userDataResponse['data']['id'])) {
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            // Извлекаем данные пользователя из ответа
            $attackerExternalId = $userDataResponse['data']['id'];

            // Проверяем, существует ли пользователь с таким external_id в нашей базе данных
            $attacker = User::where('external_id', $attackerExternalId)->first();

            if (!$attacker) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Получаем event_id из запроса
            $eventId = $request->input('event_id');

            if (!$eventId) {
                return response()->json(['message' => 'Event ID is required'], 400);
            }

            // Получаем ID защищающегося
            $defenderId = $request->input('defender_id');

            if (!$defenderId || $defenderId == $attacker->id) {
                return response()->json(['message' => 'Invalid defender ID or cannot attack yourself'], 400);
            }

            // Проверяем существование защищающегося пользователя
            $defender = User::find($defenderId);

            if (!$defender) {
                return response()->json(['message' => 'Defender not found'], 404);
            }

            // Проверка количества карточек в отряде атакующего для текущего event_id
            $attackerSquadCardsCount = Squad::where('user_id', $attacker->id)
                ->where('event_id', $eventId)
                ->count();
            if ($attackerSquadCardsCount < 3) {
                return response()->json(['message' => 'You need at least 3 cards in your squad for this event to start a battle'], 400);
            }

            // Проверка количества карточек в отряде защищающегося для текущего event_id
            $defenderSquadCardsCount = Squad::where('user_id', $defender->id)
                ->where('event_id', $eventId)
                ->count();
            if ($defenderSquadCardsCount < 3) {
                return response()->json(['message' => 'The defender needs at least 3 cards in their squad for this event to start a battle'], 400);
            }

            // Создание боя
            $battle = $this->battleService->startBattle($attacker->id, $defender->id, $eventId);

            return response()->json(['message' => 'Battle started successfully', 'battle_id' => $battle->id]);
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

    public function completeBattle(Request $request, $battle_id)
    {
        try {
            $this->battleService->performBattle($battle_id);
            return response()->json(['message' => 'Battle completed successfully.']);
        } catch (\Exception $e) {
            Log::error("Failed to complete battle: " . $e->getMessage(), [
                'battle_id' => $battle_id,
            ]);
            return response()->json(['message' => 'Failed to complete battle.'], 500);
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
