<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'fractions',
        'type_id',
        'faction_id',
        'description',
        'picture',
        'minimap',
    ];

    protected $casts = [
        'address' => 'array',
        'fractions' => 'array',
    ];

    public function factions()
    {
        return $this->belongsToMany(Faction::class, 'faction_location');
    }

    public function type()
    {
        return $this->belongsTo(LocationType::class, 'type_id');
    }
}
