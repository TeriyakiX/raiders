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
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s|after:start_time',
            'prize' => 'required|string',
            'filter_ids' => 'nullable|array',
            'filter_ids.*' => 'exists:filters,id',
        ];
    }
}
