<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource\CardResourceShow;
use App\Http\Resources\EventResource\EventResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\Event;
use App\Models\Squad;
use App\Models\User;
use App\Services\NftCardService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $accessToken = $request->cookie('access_token');

            if (!$accessToken) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $userDataResponse = $this->userService->getUserData($accessToken);

            if (!isset($userDataResponse['data']['id'])) {
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            $externalId = $userDataResponse['data']['id'];

            $user = User::where('external_id', $externalId)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            if ($event->users()->where('user_id', $user->id)->exists()) {
                return response()->json(['message' => 'User already joined this event'], 400);
            }

            // Начинаем транзакцию
            DB::beginTransaction();

            // Попытка записать пользователя на событие
            try {
                $event->users()->attach($user->id);

                $cards = $request->input('cards');

                if (!$cards || !is_array($cards)) {
                    return response()->json(['message' => 'No cards provided or invalid format'], 400);
                }

                // Добавление карточек в отряд
                foreach ($cards as $cardIdentifier) {
                    $this->addCardToSquad($user, $event, $cardIdentifier);
                }

                // Если все прошло успешно, сохраняем изменения
                DB::commit();

                $event->load('users');
                return new EventResource($event);
            } catch (\Exception $e) {
                // Если произошла ошибка при добавлении карт или других операций, откатываем транзакцию
                DB::rollBack();

                // Логируем ошибку
                Log::error("Failed to add cards or user to event: " . $e->getMessage());

                return response()->json(['message' => 'Failed to add cards or user to event: ' . $e->getMessage()], 500);
            }
        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }

    protected function addCardToSquad($user, $event, $cardIdentifier)
    {
        $card = Card::find($cardIdentifier);

        if (!$card) {
            throw new \Exception('Card not found');
        }

        $userAddress = strtolower($user->address);
        $cardOwner = strtolower($card->owner);

        if ($cardOwner !== $userAddress) {
            throw new \Exception('Card does not belong to the user');
        }

        $existingSquad = Squad::where('card_id', $card->id)
            ->where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if ($existingSquad) {
            throw new \Exception('Card already in squad for this event');
        }

        Squad::create([
            'card_id' => $card->id,
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }

    public function showEventPage(Request $request, Event $event)
    {
        try {
            $accessToken = $request->cookie('access_token');

            // Логируем accessToken
            Log::info('Access token:', ['access_token' => $accessToken]);

            if (!$accessToken) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $userDataResponse = $this->userService->getUserData($accessToken);

            // Логируем полный ответ от getUserData
            Log::info('User data response:', ['response' => $userDataResponse]);

            if (!isset($userDataResponse['data']['id'])) {
                return response()->json(['message' => 'Failed to fetch user data'], 400);
            }

            $externalId = $userDataResponse['data']['id'];
            $currentUser = User::with('league')->where('external_id', $externalId)->first();

            if (!$currentUser) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Состав текущего пользователя
            $currentUserSquad = Squad::where('user_id', $currentUser->id)
                ->where('event_id', $event->id)
                ->get()
                ->map(fn($squad) => new CardResourceShow(Card::find($squad->card_id)));

            // Все пользователи события с их составами
            $eventUsersWithSquads = $event->users()->with('league')->get()->map(function ($eventUser) use ($event) {
                $userSquad = Squad::where('user_id', $eventUser->id)
                    ->where('event_id', $event->id)
                    ->get()
                    ->map(fn($squad) => $squad->card_id); // Возвращаем только ID карточки

                return [
                    'user_id' => $eventUser->id,  // Возвращаем только ID пользователя
                ];
            });

            // Формирование итогового ответа
            return response()->json([
                'event' => new EventResource($event),
                'user' => new UserResource($currentUser),
                'squad' => $currentUserSquad,
                'members' => $eventUsersWithSquads,
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

        $accessToken = $request->cookie('access_token');

        if (!$accessToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $userDataResponse = $this->userService->getUserData($accessToken);

            if (isset($userDataResponse['error'])) {
                return response()->json($userDataResponse, $userDataResponse['status'] ?? 500);
            }

            $userData = $userDataResponse['data'];

            $user = User::where('external_id', $userData['id'])->first();

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Получаем все карты пользователя
            $allUserCards = Card::where('owner', $user->address)->get();

            $eventId = $request->query('event_id');
            $allowedFractions = [];

            if ($eventId) {
                // Загружаем событие вместе с фракциями
                $event = Event::with('location.factions')->find($eventId);
                if (!$event) {
                    return response()->json(['error' => 'Event not found'], 404);
                }

                // Извлекаем имена разрешённых фракций
                $allowedFractions = $event->location->factions->pluck('name')->toArray();
                Log::info("Allowed fractions for event ID {$eventId}: ", $allowedFractions);
            }

            // Получаем ID карт в отряде для данного пользователя
            $squadQuery = Squad::where('user_id', $user->id);
            if ($eventId) {
                $squadQuery->where('event_id', $eventId);
            }
            $squadCardIds = $squadQuery->pluck('card_id');
            Log::info("Squad card IDs for event ID {$eventId}: ", $squadCardIds->toArray());

            // Флаг для вывода дополнительной информации
            $showInfo = filter_var($request->query('show_info', false), FILTER_VALIDATE_BOOLEAN);

            // Фильтруем доступные карты
            $formattedAvailableCards = $allUserCards->filter(function ($card) use ($squadCardIds, $allowedFractions) {
                // Получаем клан карты из её метаданных
                $cardClan = collect($card->metadata['attributes'])
                    ->firstWhere('trait_type', 'Clan')['value'] ?? null;

                // Проверяем принадлежность к разрешённым фракциям
                $isValidClan = in_array($cardClan, $allowedFractions);

                // Исключаем карты, которые уже в отряде
                return $isValidClan && !$squadCardIds->contains($card->id);
            })->map(function ($card) use ($showInfo) {
                // Форматируем данные карты
                $cardData = $card->toArray();

                return $showInfo
                    ? $cardData
                    : [
                        'id' => $cardData['id'],
                        'image' => $cardData['metadata']['image'],
                    ];
            })->values()->toArray();

            // Возвращаем отфильтрованные карты
            return response()->json(['cards' => $formattedAvailableCards]);

        } catch (\Exception $e) {
            Log::error("Failed to retrieve available cards: " . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve available cards'], 500);
        }
    }

    protected function fetchAndSaveUserCards($accessToken)
    {
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
