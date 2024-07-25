<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class UserService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://rgw.zone/api',
            'timeout'  => 2.0,
        ]);
    }

    public function getUserData(string $accessToken)
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Cookie' => 'access_token=' . $accessToken,
            ])->get('https://rgw.zone/api/user');

            if ($response->successful()) {
                return $response->json();
            } else {
                return ['error' => 'Request failed', 'status' => $response->status()];
            }
        } catch (\Exception $e) {
            return ['error' => 'Request failed: ' . $e->getMessage()];
        }
    }

    public function updateLeaguePoints($user_id, $league_points)
    {
        $user = User::find($user_id);

        if ($user) {
            $user->update([
                'league_points' => $league_points,
            ]);
        }
    }
    public function getUserById($user_id)
    {
        return User::find($user_id);
    }
}
