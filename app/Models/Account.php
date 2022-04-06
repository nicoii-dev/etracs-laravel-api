<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'email',
        'password',
        'allow_login',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
