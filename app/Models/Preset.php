<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preset extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'parameters',
        'description',
        'picture',
    ];

    protected $casts = [
        'parameters' => 'array',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'parameter_preset');
    }
}
