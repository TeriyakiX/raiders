<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PresetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture,
            'parameters' => $this->parameters->map(function ($parameter) {
                return [
                    'id' => $parameter->id,
                    'name' => $parameter->name,
                    'level' => $parameter->level,
                ];
            }),
        ];
    }
}
