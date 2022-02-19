<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuridicalAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'juridical_id',
        'house_number',
        'street',
        'barangay',
        'city_municipality',
        'zipcode'
    ];
}
