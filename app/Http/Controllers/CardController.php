<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource\CardResourceShow;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\CharacterParameters;
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
    public function addToSquad(Request $request, $cardIdentifier)
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

            // Найти карточку по id
            $card = Card::find($cardIdentifier);

            if (!$card) {
                Log::error('Card not found for cardId:', ['cardId' => $cardIdentifier]);
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

            // Проверяем наличие параметров персонажа для карточки
            try {
                $characterId = $this->getCardId($card); // Получаем ID персонажа из карточки
                $characterParams = CharacterParameters::where('character_id', $characterId)->first();

                if (!$characterParams) {
                    Log::error('Character parameters not found for card:', ['cardId' => $cardIdentifier, 'characterId' => $characterId]);
                    return response()->json(['error' => 'Character parameters not found for this card'], 400);
                }
            } catch (\Exception $e) {
                Log::error('Error retrieving character parameters:', ['error' => $e->getMessage()]);
                return response()->json(['error' => 'Invalid card data or character parameters not found'], 400);
            }

            // Получаем event_id из запроса
            $eventId = $request->input('event_id');

            if (!$eventId) {
                return response()->json(['message' => 'Event ID is required'], 400);
            }

            // Проверяем, существует ли уже запись об этой карточке в отряде для данного пользователя на этот event_id
            $existingSquad = Squad::where('card_id', $card->id)
                ->where('user_id', $user->id)
                ->where('event_id', $eventId)
                ->first();

            if ($existingSquad) {
                return response()->json(['error' => 'Card already in squad for this event'], 400);
            }

            // Логика добавления карточки в отряд с event_id
            $squad = Squad::create([
                'card_id' => $card->id,
                'user_id' => $user->id,
                'event_id' => $eventId, // Сохраняем event_id
            ]);

            return response()->json(['message' => 'Card added to squad', 'squad' => $squad]);
        } catch (\Exception $e) {
            Log::error("Failed to process the request: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process the request: ' . $e->getMessage()], 500);
        }
    }

    protected function getCharacterParameters($card)
    {
        $characterId = $this->getCardId($card);
        if (empty($characterId)) {
            throw new \Exception("ID не найден в карточке.");
        }
        return CharacterParameters::where('character_id', $characterId)->firstOrFail();
    }

    public function getCardId($cardObject)
    {
        // Проверяем тип данных и преобразуем в объект, если это массив
        if (is_array($cardObject)) {
            $cardObject = (object) $cardObject;
        } elseif (is_string($cardObject)) {
            $cardObject = json_decode($cardObject);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("Ошибка декодирования JSON: " . json_last_error_msg());
            }
        } elseif (!is_object($cardObject)) {
            throw new \Exception("Неподдерживаемый тип данных");
        }
        $metadata = $cardObject->metadata ?? null;
        if ($metadata) {
            if (is_array($metadata)) {
                $metadata = (object) $metadata;
            }

            if (isset($metadata->attributes) && is_array($metadata->attributes)) {
                $id = null;
                foreach ($metadata->attributes as $attribute) {
                    // Преобразуем каждый атрибут в объект, если это массив
                    if (is_array($attribute)) {
                        $attribute = (object) $attribute;
                    }
                    if (isset($attribute->trait_type) && $attribute->trait_type === 'ID') {
                        $id = $attribute->value;
                        Log::info('Найден ID:', ['id' => $id]);
                        break;
                    }
                }

                if ($id === null) {
                    Log::error('Не удалось найти ID карты в метаданных', ['cardObject' => $cardObject]);
                } else {
                    Log::info('Найден ID карты', ['ID' => $id]);
                }
            } else {
                Log::error('Атрибуты карты отсутствуют в метаданных', ['cardObject' => $cardObject]);
            }
        } else {
            Log::error('Метаданные карты отсутствуют', ['cardObject' => $cardObject]);
        }

        if ($id === null) {
            throw new \Exception("Не удалось найти ID карты в метаданных");
        }

        return $id;
    }
    public function getUserDetailsByEvent($eventId, $userId)
    {
        try {
            $user = User::with('league')->find($userId);

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            $squad = Squad::where('user_id', $userId)
                ->where('event_id', $eventId)
                ->get()
                ->map(function ($squadItem) {
                    return new CardResourceShow(Card::find($squadItem->card_id));
                });

            return response()->json([
                'squad' => $squad,
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to fetch user details: " . $e->getMessage(), [
                'exception' => $e,
                'event_id' => $eventId,
                'user_id' => $userId,
            ]);

            return response()->json(['message' => 'Failed to fetch user details.'], 500);
        }
    }
    public function getCardDetails($eventId, $cardId)
    {
        $card = Card::find($cardId);

        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        $isMember = Squad::where('event_id', $eventId)
            ->where('card_id', $cardId)
            ->exists();

        return response()->json(new CardResourceShow($card, $isMember));
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
            $squad = Squad::where('id', $cardId)
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
