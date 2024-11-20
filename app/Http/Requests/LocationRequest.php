<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:20',
            'address' => 'required|string',
            'fractions' => 'required|array',
            'fractions.*' => 'exists:factions,id',
            'type_id' => 'required|exists:location_types,id',
            'description' => 'nullable|string|max:1000',
            'picture' => 'nullable|string',
            'minimap' => 'nullable|string',
        ];
    }
}
