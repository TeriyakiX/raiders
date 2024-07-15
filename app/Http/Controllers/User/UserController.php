<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUserData(Request $request)
    {
        // Получаем access_token из куки
        $accessToken = $request->cookie('access_token');

        if (!$accessToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Вызываем метод getUserData из UserService для выполнения запроса к API
        $userData = $this->userService->getUserData($accessToken);

        // Проверяем наличие ошибок и возвращаем результат
        if (isset($userData['error'])) {
            return response()->json(['message' => $userData['error']], 500);
        } else {
            return response()->json($userData);
        }
    }


    public function getUserInventory(Request $request)
    {
        try {
            // Получаем access_token из куки или другого источника (вашего другого API)
            $accessToken = $request->cookie('access_token');

            if (!$accessToken) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Выполняем запрос к внешнему API для получения инвентаря пользователя
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://rgw.zone/api/user/inventory');

            // Проверяем статус ответа от внешнего API
            if ($response->successful()) {
                // Возвращаем данные инвентаря в виде JSON
                return $response->json();
            } else {
                // Обработка ошибки от внешнего API
                return response()->json(['message' => 'Failed to fetch user inventory'], $response->status());
            }
        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }
}
