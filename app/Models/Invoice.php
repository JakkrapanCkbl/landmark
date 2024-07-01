<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoiceno', 'invoicedate', 'customer', 'address', 'remark', 'receiptno', 'receiptdate','created_at',
        'updated_at','deleted_at'
    ];
}
