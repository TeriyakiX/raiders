<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'location' => new LocationResource($this->location),
            'preset' => new PresetResource($this->preset),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'prizes' => $this->prizes,
            'filters' => FilterResource::collection($this->filters),
            'filter_description' => $this->filter_description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
