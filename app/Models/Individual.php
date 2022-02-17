<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'phone_number',
        'birth_date',
        'place_of_birth',
        'gender',
        'civil_status',
    ];

    public function address() {
        return $this->hasOne('App\Models\IndividualAddress', 'individual_id', 'id');
    }

    public function other_info() {
        return $this->hasOne('App\Models\OtherInformation', 'individual_id', 'id');
    }
}
