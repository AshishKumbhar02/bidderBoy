<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = [
        'user_id',
        'product_id',
        'bid_amount',
        'created_at',
        'updated_at',
    ];
}
