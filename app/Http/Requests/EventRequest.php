<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'location_id' => 'required|exists:locations,id',
            'preset_id' => 'required|exists:presets,id',
            'start_time' => 'required|date_format:Y-m-d H:i:s', // Изменено на date_start
            'end_time' => 'required|date_format:Y-m-d H:i:s|after:date_start', // Изменено на date_finish
            'prize' => 'required|string', // Приз теперь строка
            'rarity' => 'required|in:common,rare,epic,legendary', // Новое поле
            'gender' => 'required|in:male,female,both', // Новое поле
            'faction_id' => 'nullable|exists:factions,id', // Новое поле
            'class' => 'nullable|string|max:100', // Новое поле
        ];
    }
}
