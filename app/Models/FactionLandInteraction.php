<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactionLandInteraction extends Model
{
    use HasFactory;

    protected $fillable = ['faction_id', 'land_id', 'effect', 'coefficient'];

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }

    public function land()
    {
        return $this->belongsTo(Land::class);
        }
}
