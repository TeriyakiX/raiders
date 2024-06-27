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
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'prize' => $this->prize,
            'filter' => $this->filter,
            'filters' => FilterResource::collection($this->whenLoaded('filters')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
