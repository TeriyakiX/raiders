<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function interactions()
    {
        return $this->hasMany(FactionLandInteraction::class);
    }
}
