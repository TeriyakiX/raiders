<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MetaMaskAuthService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://rgw.zone/api';
    }

    /**
     * Логин пользователя через токен MetaMask.
     *
     * @param string $from Кошелек MetaMask.
     * @param string $signature Подпись от MetaMask.
     * @return array|null Массив с данными куки или null в случае ошибки.
     */

    public function loginUser(string $from, string $signature): ?string
    {
        try {
            $body = [
                'ref' => null,
                'signature' => $signature,
            ];

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/auth/register?from={$from}", $body);

            if ($response->status() !== 200) {
                return null;
            }

            $cookieHeader = $response->header('Set-Cookie');

            Log::info("Set-Cookie Header: " . $cookieHeader);

            $accessToken = $this->extractAccessTokenFromCookieHeader($cookieHeader);

            Log::info("Extracted Access Token: " . $accessToken);

            return $accessToken;

        } catch (\Exception $e) {
            Log::error("Login user error: " . $e->getMessage());
            return null;
        }
    }

    protected function extractAccessTokenFromCookieHeader(string $cookieHeader): ?string
    {
        if (preg_match('/access_token=([^;]+)/', $cookieHeader, $matches)) {
            return $matches[1];
        }
        return null;
    }


}
