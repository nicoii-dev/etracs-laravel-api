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
        'owner_name',
        'owner_address',
        'declared_owner',
        'declared_address',
        'pin',
        'beneficial_user',
        'beneficial_tin',
        'beneficial_address',
        'barangay_lgu',
        'city_municipality',
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
        'classification_id',
        'classification_name',
        'specific_class',
        'sub_class',
        'unit_value',
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
        'appraised_position',
        'appraised_date',
        'recommended_by',
        'recommended_position',
        'recommended_date',
        'approve_by',
        'approved_position',
        'approve_date',
        'remarks',
    ];
}
