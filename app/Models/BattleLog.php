<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleLog extends Model
{
    use HasFactory;

    protected $fillable = ['battle_id', 'round','attacker_card_id','defender_card_id', 'result', 'created_at', 'updated_at'];

    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function attacker_card()
    {
        return $this->belongsTo(Card::class, 'attacker_card_id');
    }

    public function defender_card()
    {
        return $this->belongsTo(Card::class, 'defender_card_id');
    }
}
