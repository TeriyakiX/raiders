<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'value'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_filters');
    }

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }
}
