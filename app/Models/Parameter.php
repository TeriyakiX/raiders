<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Parameter extends Model
{
    use HasFactory;

    protected $fillable = ['trait_type'];

    public function presets()
    {
        return $this->belongsToMany(ParameterPreset::class, 'parameter_preset_parameter');
    }
}
