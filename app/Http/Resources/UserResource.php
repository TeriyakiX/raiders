<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'external_id' => $this->external_id,
            'address' => $this->address,
            'name' => $this->name,
            'league' => new LeagueResource($this->whenLoaded('league')),
            'league_points' => $this->league_points, // Очки лиги пользователя

        ];
    }
}

