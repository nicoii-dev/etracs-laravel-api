<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'individual_id',
        'house_number',
        'street',
        'barangay',
        'city_municipality',
    ];
}
