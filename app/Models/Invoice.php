<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoiceno', 'invoicedate', 'customer', 'address',
        'description','qty','amountjob','remark','receiptno','receiptdate'
    ];
}
