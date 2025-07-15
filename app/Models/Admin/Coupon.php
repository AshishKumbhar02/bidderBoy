<?php

// app/Models/Package.php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'code',
        'description',
        'discount',
        'discount_type',
        'valid_from',
        'valid_until',
        'total_usage',
        'max_usage',
        'is_enabled',
    ];

    public $timestamps = true; 
}