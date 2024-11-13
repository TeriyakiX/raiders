<?php

namespace App\Http\Resources\CardResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CardResourceShow extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        // Получаем информацию о времени заморозки
        $frozenInfo = $this->getFrozenTimeInfo($this->frozen_until);

        return [
            'id' => $this->id,
            'image' => $this->metadata['image'] ?? null,
            'frozen_until' => $this->frozen_until,
            'frozen_status' => $frozenInfo['status'],
            'frozen_time' => $frozenInfo['remaining_time'],
        ];
    }

    /**
     * Функция для вычисления времени оставшейся заморозки
     *
     * @param mixed $frozenUntil
     * @return array
     */
    public function getFrozenTimeInfo($frozenUntil)
    {
        if ($frozenUntil) {
            $now = Carbon::now();
            $frozenUntil = Carbon::parse($frozenUntil);
            $remainingTime = $now->diff($frozenUntil);

            if ($now->lt($frozenUntil)) {
                return [
                    'status' => 'Frozen',
                    'remaining_time' => $remainingTime->format('%d days %h hours %i minutes %s seconds')
                ];
            } else {
                return [
                    'status' => 'Available',
                    'remaining_time' => '0 minutes 0 seconds'
                ];
            }
        } else {
            return [
                'status' => 'Available',
                'remaining_time' => '0 minutes 0 seconds'
            ];
        }
    }
}
