<?php

namespace App\Http\Resources;

use App\Http\Resources\CardResource\CardResourceShow;
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
            'cups' => $this->cups,
            'squad' => $this->whenLoaded('squad', function () {
                return $this->squad->map(function ($squad) {
                    return new CardResourceShow($squad->card);
                });
            }),
        ];
    }
}

