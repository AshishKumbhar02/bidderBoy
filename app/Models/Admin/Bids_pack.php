<?php

// app/Models/Package.php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Bids_pack extends Model
{
    protected $table = 'bids_packs';

    protected $fillable = ['package_name', 'total_credit', 'cost','image_path'];

    // If you have timestamps (created_at, updated_at) in your table, set this to true
    public $timestamps = true; 
}
