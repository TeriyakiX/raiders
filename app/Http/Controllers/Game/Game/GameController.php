<?php

namespace App\Http\Controllers\Game\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * Запись пользователя на событие по его id.
     */

    public function goToEvent(Request $request, Event $event)
    {
        try {
            // Получаем access_token из куки или другого источника (вашего другого API)
            $accessToken = $request->cookie('access_token');

            if (!$accessToken) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Получаем данные пользователя с помощью UserService и передаем access_token
            $userDataResponse = $this->userService->getUserData($accessToken);

            // Проверяем, был ли успешный ответ и данные пользователя получены корректно
            if (!isset($userDataResponse['data']['id'])) {
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            // Извлекаем id пользователя из полученных данных
            $userId = $userDataResponse['data']['id'];

            // Проверяем, связан ли пользователь событием уже
            if ($event->users()->where('user_id', $userId)->exists()) {
                return response()->json(['message' => 'User already joined this event'], 400);
            }

            // Проверяем, существует ли пользователь с таким external_id в нашей БД
            $user = User::where('external_id', $userDataResponse['data']['id'])->first();

            // Если пользователя нет, создаем новую запись
            if (!$user) {
                $user = new User();
                $user->external_id = $userDataResponse['data']['id'];
                $user->name = $userDataResponse['data']['name'] ?? null;
                $user->role = $userDataResponse['data']['role'] ?? 0; // Пример для поля 'role'
                $user->display_role = $userDataResponse['data']['displayRole'] ?? null; // Пример для поля 'display_role'
                $user->clan = $userDataResponse['data']['clan'] ?? null; // Пример для поля 'clan'
                $user->avatar = $userDataResponse['data']['avatar'] ?? null; // Пример для поля 'avatar'
                $user->referrals = json_encode($userDataResponse['data']['referrals'] ?? []); // Пример для поля 'referrals'
                $user->total_invitation = $userDataResponse['data']['totalInvitation'] ?? 0; // Пример для поля 'total_invitation'
                $user->email = $userDataResponse['data']['email'] ?? null;
                $user->verified = (bool) $userDataResponse['data']['verified']; // Пример для поля 'verified'
                $user->agreement = (bool) $userDataResponse['data']['agreement']; // Пример для поля 'agreement'

                $user->save();
            }

            // Если пользователь уже был записан на это событие, удаляем его
            $event->users()->detach($user->id);

            // Привязываем пользователя к событию
            $event->users()->attach($user->id);

            // Загружаем пользователей, связанных с событием
            $event->load('users');

            // Возвращаем обновленное событие в виде ресурса
            return new EventResource($event);

        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }

}
