<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'preset_id',
        'title',
        'description',
        'date_start',
        'date_finish',
        'prize',
        'rarity',
        'gender',
        'faction_id',
        'class',

    ];

    protected $casts = [
        'prize' => 'array',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
