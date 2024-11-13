<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'contract',
        'owner',
        'balance',
        'metadata',
        'frozen_until',
    ];



    protected $casts = [
        'metadata' => 'array',
        'frozen_until' => 'datetime',
    ];
    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

}
