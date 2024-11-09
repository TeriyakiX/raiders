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
        $currentTime = now();

        $frozenUntil = $this->frozen_until ? Carbon::parse($this->frozen_until) : null;

        $isFrozen = $frozenUntil && $frozenUntil > $currentTime;

        return [
            'id' => $this->id,
            'image' => $this->metadata['image'] ?? null,
            'frozen_until' => $frozenUntil ? $frozenUntil->toDateTimeString() : null,
            'is_frozen' => $isFrozen,
        ];
    }
}
