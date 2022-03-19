<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classification;

class LandAdjustment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'classification_id',
        'expression',
        'lgu_tag',
        'year_tag',
    ];

//    public function AppliedTo() {
//        return $this->belongsToMany(Classification::class)->using(Classification::class);
//    }
}
