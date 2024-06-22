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
            'location_id' => 'required|exists:locations,id',
            'preset_id' => 'required|exists:presets,id',
            'date_start' => 'required|date',
            'date_finish' => 'required|date|after:start_time',
            'prize' => 'required|array',
            'filter' => 'nullable|array',
            'filter.*.type' => 'required_with:filters|string',
            'filter.*.value' => 'required_with:filters|string',
            'filter_description' => 'nullable|string|max:1000',
        ];
    }
}
