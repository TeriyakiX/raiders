<?php

namespace App\Http\Resources\EventResource;

use App\Http\Resources\FilterResource;
use App\Http\Resources\LocationResource;
use App\Http\Resources\PresetResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class EventResource extends JsonResource
{
    protected $additionalData;

    public function __construct($resource, $additionalData = [])
    {
        parent::__construct($resource);
        $this->additionalData = $additionalData;
    }

    public function toArray($request)
    {
        // Преобразуем строку end_time в объект Carbon
        $endTime = $this->end_time ? Carbon::parse($this->end_time) : null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $endTime,
            'prize' => $this->prize ?? null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'time_remaining' => $endTime ? $endTime->diffForHumans() : null,
            'location' => new LocationResource($this->whenLoaded('location')),
            'preset' => new PresetResource($this->whenLoaded('preset')),
            'filters' => FilterResource::collection($this->whenLoaded('filters')),
        ];
    }

}
