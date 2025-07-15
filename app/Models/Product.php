<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    
    
    protected $fillable = [
        'product_title',
        'product_subtitle',
        'retail_price',
        'amount_per_bid',
        'credit_per_bid',
        'reset_time_bid',
        'start_date_bid',
        'start_hour_bid',
        'start_minute_bid',
        'start_date',
        'end_date',
        'last_bid_date',
      	'amount_per_bid_add',
        'start_hour_auction',
        'start_minute_auction',
        'start_seconds_auction',
        'delivery_information',
        'shipping_charge',
        'is_buynow',
        'description',
        'image',
        'created_at',
        'updated_at',
        'category_id',
        'last_bidder_name',
      	'last_bidder_id'
    ];
    
}
