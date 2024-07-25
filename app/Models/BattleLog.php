<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleLog extends Model
{
    use HasFactory;

    protected $fillable = ['battle_id', 'card_id', 'result'];

    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
