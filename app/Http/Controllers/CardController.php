<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Card;
use App\Models\Event;
use App\Models\Squad;
use App\Models\User;
use App\Services\CardService;
use App\Services\NftCardService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{
    protected $cardService;
    protected $nftCardService;
    protected $userService;

    public function __construct(NftCardService $nftCardService,UserService $userService,CardService $cardService)
    {
        $this->nftCardService = $nftCardService;
        $this->userService = $userService;
        $this->cardService = $cardService;
    }

    public function show($id)
    {
        $card = Card::find($id);
        return response()->json($card);
    }

    // Метод для добавления карточки в отряд
    public function addToSquad(Request $request, $cardId)
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
            $externalId = $userDataResponse['data']['id'];

            // Проверяем, существует ли пользователь с таким external_id в нашей базе данных
            $user = User::where('external_id', $externalId)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Найти карточку по card_id
            $card = Card::where('card_id', $cardId)->first();

            if (!$card) {
                Log::error('Card not found for cardId:', ['cardId' => $cardId]);
                return response()->json(['error' => 'Card not found'], 404);
            }

            // Логирование данных для отладки
            Log::info('User Address:', ['address' => $user->address]);
            Log::info('Card Owner:', ['owner' => $card->owner]);

            // Приведение значений к нижнему регистру перед сравнением
            $userAddress = strtolower($user->address);
            $cardOwner = strtolower($card->owner);

            // Проверяем, что карточка принадлежит текущему пользователю
            if ($cardOwner !== $userAddress) {
                return response()->json(['error' => 'Card does not belong to the user'], 403);
            }

            // Проверить, существует ли уже запись об этой карточке в отряде для данного пользователя
            $existingSquad = Squad::where('card_id', $card->id)
                ->where('user_id', $user->id)
                ->first();

            if ($existingSquad) {
                return response()->json(['error' => 'Card already in squad'], 400);
            }

            // Логика добавления карточки в отряд
            $squad = Squad::create([
                'card_id' => $card->id,
                'user_id' => $user->id,
            ]);

            return response()->json(['message' => 'Card added to squad', 'squad' => $squad]);
        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }

    public function removeFromSquad(Request $request, $cardId)
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
            $externalId = $userDataResponse['data']['id'];

            // Проверяем, существует ли пользователь с таким external_id в нашей базе данных
            $user = User::where('external_id', $externalId)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Найти отряд, в котором находится карточка
            $squad = Squad::where('card_id', $cardId)
                ->where('user_id', $user->id)
                ->first();

            if (!$squad) {
                return response()->json(['error' => 'Card not found in squad'], 404);
            }

            // Удалить карточку из отряда
            $squad->delete();

            return response()->json(['message' => 'Card removed from squad']);
        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }

    public function freezeCard(Request $request, $card_id)
    {
        $validated = $request->validate([
            'freeze_duration' => 'required|integer|min:1',
        ]);

        $this->cardService->freezeCard($card_id, $validated['freeze_duration']);

        return response()->json(['message' => 'Card frozen successfully']);
    }

    public function unfreezeCard($card_id)
    {
        $this->cardService->unfreezeCard($card_id);

        return response()->json(['message' => 'Card unfrozen successfully']);
    }
}
