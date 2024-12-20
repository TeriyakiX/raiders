<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Services\MetaMaskAuthService;
use App\Services\NftCardService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MetaMaskController extends Controller
{
    protected $metaMaskAuthService;
    protected $userService;

    public function __construct(MetaMaskAuthService $metaMaskAuthService, UserService $userService,NftCardService $nftCardService)
    {
        $this->metaMaskAuthService = $metaMaskAuthService;
        $this->nftCardService = $nftCardService;
        $this->userService = $userService;
    }

    public function loginWithMetaMask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|string',
            'signature' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $from = strtolower($request->input('from'));
        $signature = $request->input('signature');

        $accessToken = $this->metaMaskAuthService->loginUser($from, $signature);

        if (!$accessToken) {
            return response()->json(['message' => 'User login failed'], 401);
        }

        $userDataResponse = $this->userService->getUserData($accessToken);

        if (isset($userDataResponse['error'])) {
            return response()->json($userDataResponse, $userDataResponse['status'] ?? 500);
        }

        $userData = $userDataResponse['data'];

        $user = \App\Models\User::where('address', $from)->first();

        if ($user) {
            $user->external_id = $userData['id'];
            $user->save();
        } else {
            $user = \App\Models\User::create([
                'name' => $userData['name'],
                'role' => $userData['role'],
                'display_role' => $userData['displayRole'],
                'clan' => $userData['clan'],
                'avatar' => $userData['avatar'],
                'email' => $userData['email'],
                'verified' => $userData['verified'],
                'address' => $from,
                'external_id' => $userData['id'],
            ]);
        }

        $userHasCards = \App\Models\Card::where('owner', $from)->exists();

        if (!$userHasCards) {
            try {
                $this->fetchAndSaveUserCards($accessToken, $from);
            } catch (\Exception $e) {
                Log::error('Error fetching or saving user cards: ' . $e->getMessage());
                return response()->json(['message' => 'Failed to retrieve user cards'], 500);
            }
        } else {
            try {
                $this->fetchAndSaveUserCards($accessToken, $from);
            } catch (\Exception $e) {
                Log::error('Error fetching or saving user cards: ' . $e->getMessage());
                return response()->json(['message' => 'Failed to retrieve or update user cards'], 500);
            }
        }

        Log::info("Access Token to be set: " . $accessToken);

        $response = response()->json(['statusCode' => 200, 'data' => ['address' => $from]]);
        $response->cookie(
            'access_token',
            $accessToken,
            60,
            '/',
            null,
            true,
            false,
            false,
            'None'
        );

        return $response;
    }

    protected function fetchAndSaveUserCards($accessToken, $owner)
    {
        $data = $this->nftCardService->getUserInventory($accessToken);

        if (isset($data['error'])) {
            Log::error('Error fetching user cards: ' . $data['error']);
            throw new \Exception('Error fetching user cards: ' . $data['error']);
        }

        $apiCardIds = collect($data['data'])->pluck('id')->toArray(); // Собираем все id карт из API

        // Удаляем из базы карты, которых больше нет в API
        Card::where('owner', $owner)->whereNotIn('card_id', $apiCardIds)->delete();

        foreach ($data['data'] as $cardData) {
            // Проверка наличия "village" или "town" в metadata->attributes
            $isVillageOrTown = false;
            foreach ($cardData['metadata']['attributes'] as $attribute) {
                if (strtolower($attribute['trait_type']) === 'density' &&
                    (strtolower($attribute['value']) === 'village' || strtolower($attribute['value']) === 'town')) {
                    $isVillageOrTown = true;
                    break; // Прерываем цикл, если нашли 'village' или 'town'
                }
            }

            // Если карта является "village" или "town", пропускаем её
            if ($isVillageOrTown) {
                continue; // Пропускаем текущую итерацию цикла
            }

            $metadata = [
                'image' => $cardData['metadata']['image'] ?? null,
                'tokenId' => $cardData['id'],
                'name' => $cardData['metadata']['name'] ?? null,
                'description' => $cardData['metadata']['description'] ?? null,
                'attributes' => $cardData['metadata']['attributes'] ?? []
            ];

            // Проверяем существование карты по id
            $existingCard = Card::where('card_id', $cardData['id'])->first();

            if (!$existingCard) {
                // Создаем новую карту, если её нет
                Card::create([
                    'contract' => $cardData['contract'],
                    'card_id' => $cardData['id'],
                    'owner' => $owner,
                    'balance' => $cardData['balance'],
                    'metadata' => $metadata,
                ]);
            } else {
                // Обновляем карту, если она уже существует
                $existingCard->update([
                    'contract' => $cardData['contract'],
                    'owner' => $owner,
                    'balance' => $cardData['balance'],
                    'metadata' => $metadata,
                ]);
            }
        }
    }
}
