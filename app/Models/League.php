<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cups_from',
        'cups_to',
    ];

    // Опционально, если нужно указать связь с пользователем
    public function users()
    {
        return $this->hasMany(User::class, 'league_id');
    }
}
