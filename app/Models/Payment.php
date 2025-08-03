<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_email',
        'product_id',
        'payment_method',
        'status',
        'transaction_id',
        'amount',
        'currency'
    ];
}
