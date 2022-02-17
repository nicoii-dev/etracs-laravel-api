<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juridical extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'juridical_name',
        'contact_number',
        'date_registered',
        'kind_of_organization',
        'tin',
        'nature_of_business',
        'remarks'
    ];
}
