<?php

namespace App\Models;

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
    ];



    protected $casts = [
        'metadata' => 'array',
    ];
    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }
}
