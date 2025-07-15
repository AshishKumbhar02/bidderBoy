<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
       // check in request q is there. if it's there search with q in product_title
      //dd(date("Y-m-d H:i:s"));

        $q = $request->q;
        $category_id = $request->category;
        if($q != null){
            $products = DB::table('products')
                 ->where('start_date',"<=", date("Y-m-d H:i:s"))
                    ->where('last_bid_date',">=", date("Y-m-d H:i:s"))
              ->where('product_title', 'LIKE', '%'.$q.'%')->get();
        }
        else if($category_id != null){
            $products = DB::table('products')
                 ->where('start_date',"<=", date("Y-m-d H:i:s"))
                    ->where('last_bid_date',">=", date("Y-m-d H:i:s"))
              ->where('category_id', $category_id)->get();
        }
        else{
            $products = DB::table('products')
                ->where('start_date',"<=", date("Y-m-d H:i:s"))
                    ->where('last_bid_date',">=", date("Y-m-d H:i:s"))
              ->get();
        }

   //     $products = DB::table('products')->get();
//dd($products);

// get last bid amount for each product
        foreach($products as $product){
            $reset_time_bid = $product->reset_time_bid;
            // select last bid for this product within reset_time_bid seconds

$currentTime = now();  // Assuming 'now()' returns the current timestamp

// $last_bid = DB::table('bids')
//     ->where('product_id', $product->id)
//     ->where('updated_at', '>=', $currentTime->subSeconds($reset_time_bid))
//     ->orderBy('id', 'desc')
//     ->first();

          // $last_bid = DB::table('bids')->where('product_id', $product->id)->orderBy('id', 'desc')->first();
           //validate  $last_bid
            //   if($last_bid == null){
            //     $last_bid = new \stdClass();
            //     $product->last_bid_amount = 0;
            //     $product->last_bid_time = 00.00;
            //        $product->last_bid_user_name ='';
            //        $product->last_bid_is = 0;
            //   }
            //   else{
             
            //     $product->last_bid_time = date('Y-m-d H:i:s', strtotime($last_bid->updated_at));
            //     $product->last_bid_amount= $last_bid->bid_amount;
            //     $last_bid_user_id= $last_bid->user_id;
            //     $last_bid_user = DB::table('users')->where('id', $last_bid_user_id)->first();
            //     $product->last_bid_user_name = $last_bid_user->name;
            //    $product->last_bid_is = 1;
            //   }
         
        }
        
//         echo '<pre>';
// print_r($products);
// exit;

//select all category and send in view
        $categories = DB::table('category')->get();
    //  DB::enableQueryLog();

                  $products1 = DB::table('products')
                    ->where('start_date',">=", date("Y-m-d H:i:s"))
                   // ->where('end_date',"<=", date("Y-m-d H:i:s"))
                     ->get();
                    //  dd($products1);
      			//$products = DB::table('products')
                   // ->where('start_date',">=", date("Y-m-d H:i:s"))
                   // ->where('end_date',"<=", date("Y-m-d H:i:s"))
                   //  ->get();
     // dd(DB::getQueryLog());
$user=auth()->user();
//dd($products1);
        return view('frontend.home', compact('products', 'categories','products1','user'));
      
    }    

    public function about_us()
    {
        $about = DB::table('frontend_settings')->first()->about_us;
        return view('frontend.about-us', compact('about'));
    }
    
    public function faqs()
    {
        $faqs = DB::table('frontend_settings')->first()->faqs;
        return view('frontend.faqs', compact('faqs'));
    } 
    
    public function tips_and_tricks()
    {
        $tips_and_tricks = DB::table('frontend_settings')->first()->tips_and_tricks;
        return view('frontend.tips-trick', ['tips_and_tricks' => $tips_and_tricks]);
    }    
    
    public function terms_and_condition()
    {
        $terms_condition = DB::table('frontend_settings')->first()->terms_condition;
        return view('frontend.terms-and-condition', compact('terms_condition'));
    }
    
    public function privacy_policy()
    {
        $privacy_policy = DB::table('frontend_settings')->first()->privacy_policy;
        return view('frontend.privacy-policy', compact('privacy_policy'));
    }
    
    public function contact_us()
    {
        $contact = DB::table('frontend_settings')->first();
        return view('frontend.contact-us', compact('contact'));
    }    
    
    public function customer_profile_dashboard(Request $request)
    {
        return view('frontend.userprofile.dashboard');
    }     
    
    public function customer_profile_edit(Request $request)
    {
        $customer = DB::table('users')->where('id', auth()->user()->id)->first();
        return view('frontend.userprofile.edit' , compact('customer'));
    }  
    
    public function update_profile(Request $request){
        if ($request->hasFile('kyc_document')) {
            $file = $request->file('kyc_document');
            $fileName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/users/kyc_document'), $fileName);
            
            $user = User::find(auth()->user()->id);            
            $user->kyc_document = $fileName;
            $user->save();            
            
            return redirect()->back()->with('success', 'KYC uploaded successfully & in pending for approval!');
        }
    }
    
    public function update_basic_profile_detail(Request $request){
        
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
        $user                = User::find(auth()->user()->id);
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
        $user->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
    
    public function buy_product_detail_page($id){
        return view('frontend.product.buynow-detail', compact('id'));
    }
    
    public function buy_now_product($method, $id){
        
        $product = DB::table('products')->where('id', $id)->first();
        $coupon = null;
        if($method == 'ccavenue'){
            $orderId = DB::table('orders')->insertGetId([
                'user_id'      => auth()->user()->id,
                'total'        => $product->retail_price,
                'discount'     => session('coupon_discount') ? session('coupon_discount') : 0,
                'amount'       => session('coupon_new_total') ? session('coupon_new_total') : $product->retail_price,
                'payment_id'   => time().auth()->user()->id,
                'order_type'   => 'product_purchase',
                'order_status' => 'pending',
                'product_info' => json_encode($product),
                'payment_info' => null,
                'coupon_info'  => json_encode($coupon),
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s')
            ]);
            
            $decorator = __NAMESPACE__ . '\\Payment\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $method))) . "Controller";
            
            if (class_exists($decorator)) {
                return (new $decorator)->pay($orderId);
            }            
            
            return $orderId;
        }
    }    
}