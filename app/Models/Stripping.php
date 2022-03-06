<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stripping extends Model
{
    use HasFactory;

    protected $fillable = [
        'classification_id',
        'stripping_level',
        'rate',
    ];
}
