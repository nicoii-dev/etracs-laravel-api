<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedToLgu extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'lgu',
      'year_tag',
    ];
}
