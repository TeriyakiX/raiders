<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_difference',
        'victim_frozen_duration',
        'attacker_frozen_duration',
        'attacker_win_cups',
        'attacker_lose_cups',
        'victim_win_cups',
        'victim_lose_cups',
    ];
}
