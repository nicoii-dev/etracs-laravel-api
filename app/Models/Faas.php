<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faas extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'transaction',
        'revision_year',
        'td_number',
        'title_type',
        'title_number',
        'title_date',
        'issue_date',
        'effectivity',
        'quarter',
        'restriction',
        'previous_td_number',
        'previous_pin',
        'owner_id',
        'owner_address',
        'declared_owner',
        'declared_address',
        'pin',
        'beneficial_user',
        'beneficial_tin',
        'beneficial_address',
        'location_house_number',
        'location_street',
        'cadastral',
        'block_number',
        'survey_number',
        'purok_zone',
        'north',
        'east',
        'south',
        'west',
        'classification',
        'area',
        'area_type',
        'market_value',
        'actual_use',
        'assessment_level',
        'assessed_value',
        'taxable',
        'previous_mv',
        'previous_av',
        'appraised_by',
        'appraised_date',
        'recommended_by',
        'recommended_date',
        'approve_by',
        'approve_date',
        'remarks',
    ];
}
