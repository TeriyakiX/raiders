<?php

namespace App\Services\EventService;

use App\Models\Event;
use Illuminate\Support\Facades\Http;

class EventService
{
    public function getCellCount($locationType)
    {
        switch ($locationType) {
            case 'city':
                return 8;
            case 'village':
                return 6;
            default:
                return 0;
        }
    }

    public function getPlayers(Event $event)
    {
        $userIds = $event->users()->pluck('user_id')->toArray();
        $players = [];

        foreach ($userIds as $userId) {
            $response = Http::get('https://external-api.com/api/users/' . $userId);

            if ($response->successful()) {
                $players[] = $response->json();
            }
        }

        return $players;
    }
}
