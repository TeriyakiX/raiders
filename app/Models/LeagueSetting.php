<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueSetting extends Model
{
    use HasFactory;

    protected $fillable = ['league_name', 'settings'];

    protected $casts = [
        'settings' => 'array',
    ];
}
