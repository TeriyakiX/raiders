<?php

namespace App\Http\Controllers;

use App\Services\UserService;
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
        $accessToken = $request->cookie('access_token');

        Log::info('Request Headers: ', ['headers' => $request->headers->all()]);
        Log::info('Access Token from Cookie: ', ['access_token' => $accessToken]);

        if (!$accessToken) {
            return response()->json(['message' => 'токена нема'], 401);
        }

        $userData = $this->userService->getUserData($accessToken);

        if (isset($userData['error'])) {
            return response()->json(['message' => $userData['error']], 500);
        } else {
            return response()->json($userData);
        }
    }

    public function updateLeaguePoints(Request $request, $user_id)
    {
        $validated = $request->validate([
            'league_points' => 'required|integer',
        ]);

        $this->userService->updateLeaguePoints($user_id, $validated['league_points']);

        return response()->json(['message' => 'User league points updated successfully']);
    }
}
