<?php

namespace App\Http\Resources\CardResource;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'card_id' => $this->card_id,
            'metadata' => $this->metadata,
            'owner' => $this->owner,
        ];
    }
}
