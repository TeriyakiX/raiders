<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource\CardResource;
use App\Http\Resources\CardResource\CardResourceShow;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\Event;
use App\Models\Squad;
use App\Models\User;
use App\Services\NftCardService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    protected $nftCardService;
    protected $userService;

    public function __construct(NftCardService $nftCardService,UserService $userService)
    {
        $this->nftCardService = $nftCardService;
        $this->userService = $userService;
    }

    /**
     * Запись пользователя на событие по его id.
     */

    public function goToEvent(Request $request, Event $event)
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

            // Если пользователя нет, возвращаем ошибку
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Проверяем, связан ли пользователь с этим событием уже
            if ($event->users()->where('user_id', $user->id)->exists()) {
                return response()->json(['message' => 'User already joined this event'], 400);
            }

            // Привязываем пользователя к событию
            $event->users()->attach($user->id);

            // Получаем карточки пользователя
            $this->fetchAndSaveUserCards($accessToken);

            // Загружаем пользователей, связанных с событием
            $event->load('users');

            // Возвращаем обновленное событие в виде ресурса
            return new EventResource($event);

        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }

    public function showEventPage(Request $request, Event $event)
    {
        try {
            // Получаем access_token из куки
            $accessToken = $request->cookie('access_token');

            if (!$accessToken) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Получаем данные пользователя с помощью UserService
            $userDataResponse = $this->userService->getUserData($accessToken);

            // Логируем полученные данные
            Log::info('User data response:', ['response' => $userDataResponse]);

            // Проверяем наличие необходимых данных
            if (!isset($userDataResponse['data']['id'])) {
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            // Извлекаем данные пользователя из ответа
            $externalId = $userDataResponse['data']['id'];

            // Проверяем, существует ли пользователь с таким external_id в нашей базе данных
            $user = User::with('league')->where('external_id', $externalId)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Получаем адрес пользователя из нашей базы данных
            $userAddress = $user->address;

            if (!$userAddress) {
                return response()->json(['message' => 'User address not found'], 400);
            }

            // Получаем карточки в отряде пользователя
            $squadCards = Squad::where('user_id', $user->id)->get();
            $squadCardIds = $squadCards->pluck('card_id');

            // Получаем всех пользователей, участвующих в событии
            $eventUsers = $event->users()->with('league')->get(); // Загружаем связанную лигу

            // Возвращаем данные в виде ресурсов
            return response()->json([
                'event' => new EventResource($event),
                'user' => new UserResource($user),
                'squad' => $squadCards->map(function ($squad) {
                    return new CardResourceShow(Card::find($squad->card_id));
                }),
                'event_users' => UserResource::collection($eventUsers),
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to load the event page: " . $e->getMessage(), [
                'exception' => $e,
                'event_id' => $event->id ?? 'N/A',
                'access_token' => $request->cookie('access_token') ?? 'N/A',
            ]);
            return response()->json(['message' => 'Failed to load the event page.'], 500);
        }
    }

    public function viewAvailableCards(Request $request)
    {
        Log::info("viewAvailableCards method called");

        // Проверяем наличие токена доступа
        $accessToken = $request->cookie('access_token');

        if (!$accessToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            // Получаем данные пользователя от внешнего сервиса
            $userDataResponse = $this->userService->getUserData($accessToken);

            if (isset($userDataResponse['error'])) {
                return response()->json($userDataResponse, $userDataResponse['status'] ?? 500);
            }

            $userData = $userDataResponse['data'];

            $user = User::where('external_id', $userData['id'])->first();

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Получаем все карточки пользователя
            $allUserCards = Card::where('owner', $user->address)->get();

            // Получаем карточки в отряде пользователя
            $squadCardIds = Squad::where('user_id', $user->id)->pluck('card_id');
            Log::info("Squad card IDs: ", $squadCardIds->toArray());

            // Определяем, нужно ли показывать полные данные
            $showInfo = filter_var($request->input('show_info', false), FILTER_VALIDATE_BOOLEAN);

            // Форматируем карточки
            $formattedAvailableCards = $allUserCards->map(function($card) use ($squadCardIds, $showInfo) {
                $isInSquad = $squadCardIds->contains($card->id); // Убедитесь, что здесь используется правильное поле для проверки

                $cardData = $card->toArray();
                $cardData['in_squad'] = $isInSquad;

                return $showInfo ? $cardData : [
                    'id' => $cardData['id'],
                    'image' => $cardData['metadata']['image'],
                    'in_squad' => $cardData['in_squad'],
                ];
            })->values()->toArray();

            return response()->json(['cards' => $formattedAvailableCards]);

        } catch (\Exception $e) {
            Log::error("Failed to retrieve available cards: " . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve available cards'], 500);
        }
    }


    protected function fetchAndSaveUserCards($accessToken)
    {
        // Получаем данные карточек пользователя
        $data = $this->nftCardService->getUserInventory($accessToken);

        if (isset($data['error'])) {
            Log::error('Error fetching user cards: ' . $data['error']);
            throw new \Exception('Error fetching user cards: ' . $data['error']);
        }

        foreach ($data['data'] as $cardData) {
            $metadata = [
                'image' => $cardData['metadata']['image'],
                'tokenId' => $cardData['id'],
                'name' => $cardData['metadata']['name'],
                'description' => $cardData['metadata']['description'],
                'attributes' => $cardData['metadata']['attributes']
            ];

            Card::updateOrCreate(
                ['card_id' => $cardData['id']],
                [
                    'contract' => $cardData['contract'],
                    'owner' => $cardData['owner'],
                    'balance' => $cardData['balance'],
                    'metadata' => $metadata,
                ]
            );
        }
    }




}
