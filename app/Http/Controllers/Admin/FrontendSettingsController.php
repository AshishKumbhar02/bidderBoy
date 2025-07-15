<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendSettingsController extends Controller
{
    public function index()
    {
        // Handle the logic for displaying the frontend settings form
    }

    public function update()
    {
        // Handle the logic for updating the frontend settings
    }
    
    public function update_contact_detail(Request $request){

        DB::table('frontend_settings')->where('id', 1)->update([
            'contact_email' => $request->contact_email, 
            'contact_phone' => $request->contact_phone, 
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'youtube_url' => $request->linkedin_url,
            'linkedin_url' => $request->linkedin_url,
            'address' => $request->address
        ]);
            
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'Contact details updated successfully'
        ];
        return response()->json($response);            
    }
    
    public function update_about_us(Request $request){
        // Perform the "update or insert" operation
        DB::table('frontend_settings')->where('id', 1)->update([
            'about_us' => $request->about_us
        ]);
            
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'About Us updated successfully'
        ];
        return response()->json($response);         
    }
    
    public function update_terms_and_condition(Request $request){
        // Perform the "update or insert" operation
        DB::table('frontend_settings')->where('id', 1)->update([
            'terms_condition' => $request->terms_condition
        ]);
            
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'Terms & condition updated successfully'
        ];
        return response()->json($response);         
    }
    
    public function update_privacy_policy(Request $request){
        // Perform the "update or insert" operation
        DB::table('frontend_settings')->where('id', 1)->update([
            'privacy_policy' => $request->privacy_policy
        ]);
            
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'Privacy policy updated successfully'
        ];
        return response()->json($response);         
    }  
    
    public function update_faqs(Request $request){
        // Perform the "update or insert" operation
        
        $faqs = [];
        $x = 0;
        foreach($request->question as $question){
            if($question){
                $faqs[] = [$question => $request->answer[$x]];
            }
            $x++;
        }
        
        DB::table('frontend_settings')->where('id', 1)->update([
            'faqs' => json_encode($faqs)
        ]);
            
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'FAQs updated successfully'
        ];
        return response()->json($response);         
    }   
    
    public function update_tips_and_trick(Request $request){
        
        //
        DB::table('frontend_settings')->where('id', 1)->update([
            'tips_and_tricks' => $request->tips_and_tricks
        ]);
            
        // Return the JSON response
        $response = [
            'status' => true,
            'notification' => 'Tips & Tricks Updated Successfully!'
        ];
        return response()->json($response);         
    }    
        
}