<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    protected $table = 'business_settings';

    // Define any relationships or additional methods here
    public static function getSetting($name)
    {
        $value = BusinessSetting::where('name', $name)->select('value')->first();
        return $value->value;
    }
}
