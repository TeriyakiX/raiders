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
        return [
            'id' => $this->id,
            'image' => $this->metadata['image'] ?? null,
        ];
    }
}
