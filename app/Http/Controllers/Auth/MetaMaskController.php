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
        // Валидация входящих данных
        $validator = Validator::make($request->all(), [
            'from' => 'required|string',
            'signature' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Извлечение данных из запроса
        $from = strtolower($request->input('from')); // Приводим к нижнему регистру
        $signature = $request->input('signature');

        // Получаем токен доступа через MetaMask
        $accessToken = $this->metaMaskAuthService->loginUser($from, $signature);

        if (!$accessToken) {
            return response()->json(['message' => 'User login failed'], 401);
        }

        // Получаем данные пользователя от внешнего сервиса
        $userDataResponse = $this->userService->getUserData($accessToken);

        if (isset($userDataResponse['error'])) {
            return response()->json($userDataResponse, $userDataResponse['status'] ?? 500);
        }

        $userData = $userDataResponse['data'];

        // Проверяем, существует ли пользователь с данным адресом
        $user = \App\Models\User::where('address', $from)->first();

        if ($user) {
            // Если пользователь существует, обновляем external_id
            $user->external_id = $userData['id'];
            $user->save();
        } else {
            // Если пользователя нет, создаем его
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

        // Проверяем, есть ли карточки у данного пользователя
        $userHasCards = \App\Models\Card::where('owner', $from)->exists();

        // Если карточек нет, загружаем и сохраняем их
        if (!$userHasCards) {
            try {
                $this->fetchAndSaveUserCards($accessToken);
            } catch (\Exception $e) {
                Log::error('Error fetching or saving user cards: ' . $e->getMessage());
                return response()->json(['message' => 'Failed to retrieve user cards'], 500);
            }
        } else {
            Log::info('User cards already exist, skipping fetching cards.');
        }

        // Логирование полученного токена для проверки
        Log::info("Access Token to be set: " . $accessToken);

        // Устанавливаем куку 'access_token' в ответе
        $response = response()->json(['statusCode' => 200, 'data' => ['address' => $from]]);
        $response->cookie(
            'access_token',   // Название куки
            $accessToken,     // Значение куки
            60,               // Время жизни куки в минутах
            '/',              // Путь
            null,             // Домен
            true,             // Secure (для HTTPS)
            false,            // HttpOnly
            false,            // Zashifrovannaya
            'None'            // SameSite
        );

        return $response;
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
