<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipality_id',
        'lgu_name',
        'formal_name',
        'index_number',
        'pin'
    ];
}
