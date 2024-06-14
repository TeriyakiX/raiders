<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = ['name', 'level'];
    protected $appends = ['selected'];

    public function presets()
    {
        return $this->belongsToMany(Preset::class);
    }

    public function getSelectedAttribute()
    {
        return false;
    }
}
