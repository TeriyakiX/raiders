<?php

namespace App\Http\Resources;

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
            'end_time' => $endTime, // Используем $endTime, который может быть null или объектом Carbon
            'prize' => $this->prize ?? null,
            'filter' => $this->filter ?? null,
            'filters' => FilterResource::collection($this->whenLoaded('filters')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'time_remaining' => $endTime ? $endTime->diffForHumans() : null, // Вызываем diffForHumans() на объекте Carbon
            'locationType' => $this->location ? $this->location->type : null,
            'users' => UserResource::collection($this->whenLoaded('users')),
        ];
    }

}
