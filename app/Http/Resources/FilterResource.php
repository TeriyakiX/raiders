<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilterResource extends JsonResource
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
            'rarity' => $this->rarity,
            'gender' => $this->gender,
            'faction' => new FactionResource($this->whenLoaded('faction')), // Подгружаем фракцию
            'class' => $this->class,
        ];
    }
}
