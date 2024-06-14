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
            'location_id' => 'required|exists:locations,id',
            'preset_id' => 'required|exists:presets,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'prizes' => 'required|array',
            'filters' => 'nullable|array',
            'filters.*.type' => 'required_with:filters|string',
            'filters.*.value' => 'required_with:filters|string',
            'filter_description' => 'nullable|string|max:1000',
        ];
    }
}
