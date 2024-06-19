<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'qty', 'amountjob', 'invoice_id', 'created_at',
        'updated_at', 'deleted_at'
    ];
}
