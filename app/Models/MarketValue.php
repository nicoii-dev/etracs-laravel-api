<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_level_id',
        'market_value_from',
        'market_value_to',
        'market_value_rate',
    ];
}
