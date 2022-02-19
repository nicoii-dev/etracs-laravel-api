<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'multiple_id',
        'house_number',
        'street',
        'barangay',
        'city_municipality',
        'zipcode'
    ];
}
