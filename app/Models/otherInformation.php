<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'individual_id',
        'profession',
        'id_presented',
        'tin',
        'sss',
        'height',
        'weight'
    ];
}
