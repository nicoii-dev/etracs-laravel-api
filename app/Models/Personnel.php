<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_number',
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'birth_date',
        'email',
        'phone_number',
        'txn_code',
    ];
}
