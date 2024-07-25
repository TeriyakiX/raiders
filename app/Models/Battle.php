<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    protected $fillable = ['attacker_id', 'defender_id', 'attacker_initial_cups', 'defender_initial_cups', 'attacker_final_cups', 'defender_final_cups', 'status'];

    public function participants()
    {
        return $this->hasMany(BattleParticipant::class);
    }

    public function logs()
    {
        return $this->hasMany(BattleLog::class);
    }

    public function attacker()
    {
        return $this->belongsTo(User::class, 'attacker_id');
    }

    public function defender()
    {
        return $this->belongsTo(User::class, 'defender_id');
    }

}
