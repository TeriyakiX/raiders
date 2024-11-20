<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preset extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
