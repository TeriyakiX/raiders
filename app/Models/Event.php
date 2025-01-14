<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'start_time', 'end_time', 'prize', 'location_id', 'preset_id'
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
        return $this->belongsToMany(User::class);
    }
    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'event_filters');
    }
}
