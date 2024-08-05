<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterParameters extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'rarity',
        'gender',
        'clan',
        'name',
        'role',
        'initiative_numeric',
        'movement_speed_numeric',
        'search_diameter_numeric',
        'laziness_numeric',
        'search_numeric',
        'gather_numeric',
        'combat_diameter_numeric',
        'damage_numeric',
        'shield_numeric',
        'health_numeric',
        'cooldown_numeric',
        'initiative',
        'movement_speed',
        'search_diameter',
        'laziness',
        'search',
        'gather',
        'combat_diameter',
        'damage',
        'shield',
        'health',
        'cooldown',
    ];
}
