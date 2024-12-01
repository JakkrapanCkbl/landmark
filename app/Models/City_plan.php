<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'doc_group',
        'asa_no',
        'publish_date',
        'law_type',
        'province',
        'description',
        'expire_date',
        'organization',
        'remark'
    ];

}
