<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\BattleParticipant;
use App\Models\Card;
use App\Models\Faction;
use App\Models\FactionLandInteraction;
use App\Models\Land;
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

            // Создание боя
            $battle = $this->battleService->startBattle($attacker->id, $defender->id);

            return response()->json(['message' => 'Battle started successfully', 'battle_id' => $battle->id]);
        } catch (\Exception $e) {
            Log::error("Failed to start battle: " . $e->getMessage(), [
                'exception' => $e,
                'attacker_id' => $attacker->id ?? 'N/A',
                'defender_id' => $defenderId ?? 'N/A',
            ]);
            return response()->json(['message' => 'Failed to start battle.'], 500);
        }
    }

    public function getBattleStatus($battle_id)
    {
        try {
            $battle = Battle::find($battle_id);

            if (!$battle) {
                return response()->json(['message' => 'Battle not found'], 404);
            }

            return response()->json($this->battleService->getBattleStatus($battle));
        } catch (\Exception $e) {
            Log::error("Failed to get battle status: " . $e->getMessage(), [
                'exception' => $e,
                'battle_id' => $battle_id,
            ]);
            return response()->json(['message' => 'Failed to get battle status.'], 500);
        }
    }

    public function performBattle(Request $request, $battle_id)
    {
        try {
            $battle = Battle::find($battle_id);

            if (!$battle) {
                return response()->json(['message' => 'Battle not found'], 404);
            }

            $actions = $request->input('actions', []);

            // Вызов сервиса выполнения боя
            $result = $this->battleService->performBattle($battle, $actions);

            return response()->json([
                'message' => 'Battle performed successfully',
                'results' => $result['results'],
                'final_status' => $result['final_status']
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to perform battle: " . $e->getMessage(), [
                'exception' => $e,
                'battle_id' => $battle_id,
                'actions' => $request->input('actions')
            ]);
            return response()->json(['message' => 'Failed to perform battle.'], 500);
        }
    }

    public function getBattleLogs($battle_id)
    {
        try {
            $battle = Battle::find($battle_id);

            if (!$battle) {
                return response()->json(['message' => 'Battle not found'], 404);
            }

            return response()->json($this->battleService->getBattleLogs($battle));
        } catch (\Exception $e) {
            Log::error("Failed to get battle logs: " . $e->getMessage(), [
                'exception' => $e,
                'battle_id' => $battle_id,
            ]);
            return response()->json(['message' => 'Failed to get battle logs.'], 500);
        }
    }
}
