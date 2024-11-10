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
    ];



    protected $casts = [
        'metadata' => 'array',
    ];
    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function getFrozenStatus()
    {
        if ($this->frozen_until && $this->frozen_until > now()) {
            $remainingTime = Carbon::now()->diffInMinutes($this->frozen_until);
            return [
                'is_frozen' => true,
                'remaining_time' => $remainingTime . ' минут'
            ];
        }
        return [
            'is_frozen' => false,
            'remaining_time' => null
        ];
    }
}
