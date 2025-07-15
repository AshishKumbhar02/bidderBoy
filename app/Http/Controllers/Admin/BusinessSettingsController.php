<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class BusinessSettingsController extends Controller
{
    public function index()
    {
        return view('backend.business_settings.index');
    }
    
    public function update_fast2sms_settings(Request $request){
        $data = [ 'value' => (isset($request->fast2sms_registration_otp)) ? $request->fast2sms_registration_otp : 'off' ];
        
        $condition = [ 'name' => 'fast2sms_registration_otp' ];
        
        DB::table('business_settings')->updateOrInsert($condition, $data);       
        
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'Settings Updated successfully'
        ];
        //return $request->all();
        return response()->json($response);           
    }
    
    public function update_kyc_verification_settings(Request $request){
        $data = [ 'value' => (isset($request->kyc_verification)) ? $request->kyc_verification : 'off' ];
        
        $condition = [ 'name' => 'kyc_verification' ];
        
        DB::table('business_settings')->updateOrInsert($condition, $data);       
        
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'Settings Updated successfully'
        ];
        
        return response()->json($response);           
    }    
        
}