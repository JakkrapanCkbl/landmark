<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proptype extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'itemno', 'show_prop_type'
    ];
    
}
