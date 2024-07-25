<?php

namespace App\Services;

use App\Models\Battle;
use App\Models\Card;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CardService
{
    public function freezeCard($card_id, $freeze_duration)
    {
        $card = Card::find($card_id);

        if ($card) {
            $card->update([
                'frozen_until' => now()->addSeconds($freeze_duration),
            ]);
        } else {
            Log::error("Card not found for ID: $card_id");
        }
    }

    public function unfreezeCard($card_id)
    {
        $card = Card::find($card_id);

        if ($card) {
            $card->update([
                'frozen_until' => null,
            ]);
        } else {
            Log::error("Card not found for ID: $card_id");
        }
    }

    public function getUserCards($userId)
    {
        // Получаем все карточки пользователя, которые не заморожены
        return Card::where('user_id', $userId)
            ->where('frozen_until', '<', now()) // Учитываем только карточки, которые не заморожены
            ->get();
    }

    public function getCardById($cardId)
    {
        // Найти карточку по card_id
        return Card::where('id', $cardId)->first();
    }

    public function getAvailableCards($user_id)
    {
        return Card::where('user_id', $user_id)
            ->whereNull('frozen_until')
            ->orderBy('initiative', 'desc')
            ->take(4)
            ->get();
    }
}
