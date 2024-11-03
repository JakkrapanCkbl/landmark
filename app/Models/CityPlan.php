<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'asa_no',
        'publish_date',
        'province',
        'description',
        'expire_date',
        'organization',
    ];

}
