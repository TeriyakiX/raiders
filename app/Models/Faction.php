<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function interactions()
    {
        return $this->hasMany(FactionLandInteraction::class);
    }

    public function filters()
    {
        return $this->hasMany(Filter::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'faction_location');
    }
}
