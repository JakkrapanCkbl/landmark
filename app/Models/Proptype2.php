<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proptype2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'show_prop_type', 'show_prop_type2'
    ];


}
