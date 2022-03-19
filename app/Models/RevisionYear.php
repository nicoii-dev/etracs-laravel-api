<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'revision_year',
    ];
}
