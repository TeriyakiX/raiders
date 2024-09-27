<?php

namespace App\Http\Resources\EventResource;

use App\Http\Resources\FilterResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventShowResource extends JsonResource
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
            'description' => $this->description,
            'start_time' => $this->date_start,
            'end_time' => $this->date_finish,
            'prize' => $this->prize,
            'filters' => [
                'rarity' => $this->rarity,          // Поля из таблицы events
                'gender' => $this->gender,          // Поля из таблицы events
                'faction_id' => $this->faction_id,  // Поля из таблицы events
                'class' => $this->class,            // Поля из таблицы events
            ],
        ];
    }
}
