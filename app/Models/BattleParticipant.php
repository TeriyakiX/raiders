<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleParticipant extends Model
{
    use HasFactory;

    protected $fillable = ['battle_id', 'user_id', 'cards'];

    protected $casts = [
        'cards' => 'array',
    ];

    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
