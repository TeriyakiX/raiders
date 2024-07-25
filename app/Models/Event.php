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
        'start_time',
        'end_time',
        'prize',
        'filter',

    ];

    protected $casts = [
        'prize' => 'array',
        'filter' => 'array',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'event_filters');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
