<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterPreset extends Model
{
    use HasFactory;

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'parameter_preset_parameter');
    }
}
