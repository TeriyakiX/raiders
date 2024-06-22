<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://rgw.zone/api';
    }

    /**
     * Register a new user.
     *
     * @param array $data
     * @return string|null
     */
    public function register(array $data): ?string
    {
        try {
            $response = Http::post("{$this->baseUrl}/auth/register", [
                'from' => $data['from'],
                'ref' => $data['ref'] ?? null,
                'signature' => $data['signature']
            ]);

            if ($response->status() !== 200) {
                return null;
            }

            return $response->body();
        } catch (\Exception $e) {
            Log::error("Register error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Verify user's email.
     *
     * @param string $email
     * @return bool
     */
    public function verifyEmail(string $email): bool
    {
        try {
            $response = Http::get("{$this->baseUrl}/auth/verifyEmail", [
                'email' => $email,
            ]);

            return $response->status() === 200;
        } catch (\Exception $e) {
            Log::error("Verify email error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get user data.
     *
     * @return array|null
     */
    public function getUser(): ?array
    {
        try {
            $response = Http::get("{$this->baseUrl}/user");

            if ($response->status() !== 200) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error("Get user error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Set user's name.
     *
     * @param string $name
     * @return bool
     */
    public function setName(string $name): bool
    {
        try {
            $response = Http::post("{$this->baseUrl}/user/setName", [
                'name' => $name,
            ]);

            return $response->status() === 200;
        } catch (\Exception $e) {
            Log::error("Set name error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Set user's email.
     *
     * @param string $email
     * @return bool
     */
    public function setEmail(string $email): bool
    {
        try {
            $response = Http::post("{$this->baseUrl}/user/setEmail", [
                'email' => $email,
            ]);

            return $response->status() === 200;
        } catch (\Exception $e) {
            Log::error("Set email error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Set user's agreement.
     *
     * @param bool $agreement
     * @return bool
     */
    public function setAgreement(bool $agreement): bool
    {
        try {
            $response = Http::post("{$this->baseUrl}/user/setAgreement", [
                'agreement' => $agreement,
            ]);

            return $response->status() === 200;
        } catch (\Exception $e) {
            Log::error("Set agreement error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Update user's avatar.
     *
     * @param string $avatar
     * @return bool
     */
    public function updateAvatar(string $avatar): bool
    {
        try {
            $response = Http::post("{$this->baseUrl}/user/updateAvatar", [
                'avatar' => $avatar,
            ]);

            return $response->status() === 200;
        } catch (\Exception $e) {
            Log::error("Update avatar error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get user's inventory.
     *
     * @return array|null
     */
    public function getInventory(): ?array
    {
        try {
            $response = Http::get("{$this->baseUrl}/user/inventory");

            if ($response->status() !== 200) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error("Get inventory error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Get user's inventories.
     *
     * @return array|null
     */
    public function getInventories(): ?array
    {
        try {
            $response = Http::get("{$this->baseUrl}/user/inventories");

            if ($response->status() !== 200) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error("Get inventories error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Get character data.
     *
     * @param int $tokenId
     * @return array|null
     */
    public function getCharacter(int $tokenId): ?array
    {
        try {
            $response = Http::get("{$this->baseUrl}/user/character/{$tokenId}");

            if ($response->status() !== 200) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error("Get character error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Get village data.
     *
     * @param int $tokenId
     * @return array|null
     */
    public function getVillage(int $tokenId): ?array
    {
        try {
            $response = Http::get("{$this->baseUrl}/user/village/{$tokenId}");

            if ($response->status() !== 200) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error("Get village error: " . $e->getMessage());
            return null;
        }
    }
}
