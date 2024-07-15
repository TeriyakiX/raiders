<?php

namespace App\Http\Controllers\Auth\MetaMask;

use App\Http\Controllers\Controller;
use App\Services\AuthService\MetaMaskAuthService;
use App\Services\EventService\EventService;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MetaMaskController extends Controller
{
    protected $metaMaskAuthService;

    public function __construct(MetaMaskAuthService $metaMaskAuthService,)
    {
        $this->metaMaskAuthService = $metaMaskAuthService;
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

        $from = $request->input('from');
        $signature = $request->input('signature');

        $accessToken = $this->metaMaskAuthService->loginUser($from, $signature);

        if (!$accessToken) {
            return response()->json(['message' => 'User login failed'], 401);
        }

        // Логирование полученного токена для проверки
        Log::info("Access Token to be set: " . $accessToken);

        // Устанавливаем куку 'access_token' в ответе
        $response = response()->json(['statusCode' => 200, 'data' => ['address' => $from]]);
        $response->cookie('access_token', $accessToken, 60, '/', null, true, true); // HttpOnly и Secure

        return $response;
    }


}
