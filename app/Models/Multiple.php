<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiple extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'multiple_name',
        'contact_number',
        'remarks'
    ];
}
