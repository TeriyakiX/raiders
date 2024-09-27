<?php

namespace App\Http\Resources\EventResource;

use App\Http\Resources\FilterResource;
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
            'start_time' => $this->date_start, // Изменено на date_start
            'end_time' => $endTime,
            'prize' => $this->prize ?? null,
            'rarity' => $this->rarity,          // Поля добавлены
            'gender' => $this->gender,          // Поля добавлены
            'faction_id' => $this->faction_id,  // Поля добавлены
            'class' => $this->class,            // Поля добавлены
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'time_remaining' => $endTime ? $endTime->diffForHumans() : null,
            'locationType' => $this->location ? $this->location->type : null,
            'users' => UserResource::collection($this->whenLoaded('users')),
        ];
    }

}
