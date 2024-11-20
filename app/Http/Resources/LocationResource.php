<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'title' => $this->title,
            'address' => $this->address,
            'fractions' => $this->factions->map(function ($fraction) {
                return [
                    'id' => $fraction->id,
                    'name' => $fraction->name,
                ];
            }),
            'type' => $this->type,
            'description' => $this->description,
            'picture' => $this->picture,
            'minimap' => $this->minimap,
        ];
    }
}
