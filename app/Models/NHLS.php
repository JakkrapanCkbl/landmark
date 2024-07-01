<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NHLS extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_name', 'date', 'jobcode', 'zone',
        'fee_travel', 'fee_car_rental', 'fee_fuel', 'fee_toll', 'fee_accomodation',
        'per_diem', 'fee_wrting', 'fee_land_title_deed_check', 'fee_survey',
        'fee_photocopy', 'fee_urgent', 'fee_others', 'others_remark',  'advance_payment'
    ];
}
