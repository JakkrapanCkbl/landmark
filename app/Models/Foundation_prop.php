<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foundation_prop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'prop_type', 'prop_name', 'prop_location', 'deed_no',
        'rai', 'ngan', 'wha', 'owner', 'prop_status',
        'owner_how', 'certificate', 'prop_operator', 'prop_operator2', 'remark', 'gps'
    ];
}
