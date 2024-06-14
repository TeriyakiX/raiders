<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathSetting extends Model
{
    use HasFactory;

    protected $fillable = ['formula_name', 'formula'];
}
