<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'fractions',
        'type',
        'description',
        'picture',
        'minimap',
    ];

    protected $casts = [
        'address' => 'array',
        'fractions' => 'array',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
