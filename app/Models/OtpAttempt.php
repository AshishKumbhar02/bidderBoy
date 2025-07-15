<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpAttempt extends Model
{
    protected $table = 'otp_attempts';
    protected $fillable = ['mobile_number', 'attempts', 'last_attempt_at'];

    // Define any relationships or additional methods here
    public static function checkAttempts($mobileNumber){
    
        $otpAttempts = OtpAttempt::where('mobile_number', $mobileNumber)->first();
    
        if ($otpAttempts) {
            if ($otpAttempts->attempts >= 3 && OtpAttempt::isWithin24Hours($otpAttempts->last_attempt_at)) {
                return false;
            }
    
            $otpAttempts->attempts++;
            $otpAttempts->last_attempt_at = now();
            $otpAttempts->save();
        } else {
            OtpAttempt::create([
                'mobile_number' => $mobileNumber,
                'attempts' => 1,
                'last_attempt_at' => now(),
            ]);
        }
    
        return true;
    }
    
    public static function isWithin24Hours($timestamp)
    {
        return now()->diffInHours($timestamp) < 24;
    }    
}