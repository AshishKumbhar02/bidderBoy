<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $param['name']          = $request->name;
        $param['username']      = $request->username;
        $param['email']         = $request->email;
        $param['mobile_number'] = $request->mobile_number;
        $param['ip_address']    = $request->ip_address;
        $param['is_active']     = $request->is_active;
        
        $query = DB::table('users');
        
        if($param['name']){
            $query->where('name', 'like', '%'.$param['name'].'%');
            $query->orWhere('first_name', 'like', '%'.$param['name'].'%');
            $query->orWhere('last_name', 'like', '%'.$param['name'].'%');
        }
        
        if($param['username']){
            $query->orWhere('username', '=', $param['username']);
        }
        
        if($param['email']){
            $query->where('email', $param['email']);
        }  
        
        if($param['mobile_number']){
            $query->where('mobile_number', 'like', '%'.$param['mobile_number'].'%');
        }   
        
        if($param['ip_address']){
            $query->where('ip_address', $param['ip_address']);
        }   
        
        if($param['is_active']){
            $is_active = ($param['is_active'] == 'active') ? 1 : 0;
            $query->where('is_active', $is_active);
        }          
        
        $customers = $query->paginate(10);
        return view('backend.customers.index', compact('customers', 'param'));
    }
    
    public function update_kyc_ducument_status(Request $request, $id, $status){
        DB::table('users')->where('id', '=', $id)->update([
            'kyc_document_verification' => $status
        ]);
        $status = $status ? "KYC Approved" : "KYC Disapproved";
        return redirect()->back()->with('success', $status.' successfully!');
    }
    
    public function update_customer_status(Request $request, $id, $status){
        DB::table('users')->where('id', '=', $id)->update([
            'is_active' => $status
        ]);
        $status = $status ? "Customer Activated" : "Customer Deactivated";
        return redirect()->back()->with('success', $status.' successfully!');
    }    
    
    public function credits_list()
    {
        $credits = DB::table('credits')->get();
        return view('backend.customers.credits', compact('credits'));
    } 
    
    public function update_credit_request(Request $request, $id, $status, $credit, $user_id){
        DB::table('credits')->where('id', '=', $id)->update([
            'status' => $status
        ]);
        
        DB::table('users')->where('id', '=', $user_id)->update([
            'credits' => DB::raw('credits + ' . $credit)
        ]); 
        
        $status = $status ? "Credit Approved" : "Credit Disapproved";
        return redirect()->back()->with('success', $status.' successfully!');        
    }
    
    public function create(Request $request)
    {
        return view('backend.customers.create_customer');
    } 
    
    public function createPost(Request $request){
        
        $validatedData = $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'username'      =>  'required|unique:users',
            'email'         =>  'required|unique:users',
            'mobile_number' => 'required|unique:users',
            'password'      => 'required|min:8|confirmed',
            'address'       => 'required',
        ]);

        //Update the customer's profile
        
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'password' => Hash::make($request->password),
            'address' => $request->input('address'),
            'credits' => $request->input('credits'),
        ]);
        
        return redirect()->route('customers.index')->with('success', 'Profile updated successfully.');
    }    
    
    public function edit_customer(Request $request, $id)
    {
        $customer = DB::table('users')->where('id', $id)->first();
        return view('backend.customers.edit_customer', compact('customer'));
    } 
    
    public function delete_customer(Request $request, $id){
        
        DB::table('users')->where('id', $id)->delete();
        
        DB::table('credits')->where('user_id', $id)->delete();
        
        return redirect()->back()->with('success', 'User deleted successfully.');

    }
    
    public function update_customer_profile(Request $request, $id){
        
        //return $id;
        //return $request->change_username;
        //Validate the form data
        $validatedData = $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'username'      => ($request->change_username == 1) ? 'required|unique:users' : '',
            'mobile_number' => ($request->change_mobile_number == 1) ? 'required|unique:users' : '',
            'password'      => ($request->change_password == 1) ? 'required|min:8|confirmed' : '',
            'address'       => 'required',
        ]);

        //Update the customer's profile
        $user                = User::find($id);
        $user->name          = $request->input('first_name').' '.$request->input('last_name');
        $user->first_name    = $request->input('first_name');
        $user->last_name     = $request->input('last_name');
        if($request->change_username == 1){
            $user->username  = $request->input('username');
        }
        if($request->change_mobile_number == 1){
            $user->mobile_number = $request->input('mobile_number');
        }  
        
        if($request->change_password == 1){
            $user->password = Hash::make($request->password);
        }         
        
        $user->address       = $request->input('address');
        $user->credits       = $request->input('credits');
        $user->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
        
}