<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'rarity',
        'gender',
        'faction_id',
        'class',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_filter');
    }

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }
}
