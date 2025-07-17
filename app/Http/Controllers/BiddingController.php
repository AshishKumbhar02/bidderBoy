<?php

namespace App\Http\Controllers;

use App\Events\ProductPriceUpdated;
use App\Events\UpdateBidPrice;
use App\Models\User;
use App\Models\OtpAttempt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Utilities\Fast2SMSUtility;
use App\Utilities\EmailUtility;

use App\Models\Product;
use App\Models\Bid;
use App\Models\Auto_bid_user;
use Illuminate\Support\Facades\Http;
use DateTime;

use Illuminate\Support\Facades\DB;


class BiddingController extends Controller
{

    public function bil_list(Request $request)
    {
        // Retrieve data from both tables using a join
        $data = DB::table('auto_bid_user')->join('users', 'users.id', '=', 'auto_bid_user.user_id')
            ->select(
                'users.id as user_id',
                'users.name',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.email',
                'users.mobile_number',
                'users.credits',
                'auto_bid_user.id as auto_bid_id',
                'auto_bid_user.product_id',
                'auto_bid_user.credit_use_for_bid',
                'auto_bid_user.stat_from_bid_price',
                'auto_bid_user.bid_allow',
                'auto_bid_user.created_at',
                'auto_bid_user.updated_at'
            )
            ->orderBy('auto_bid_user.id', 'desc') // Add this line to order by auto_bid_user.id in descending order

            ->get();
        // dd($data);

        return view('backend.customers.bil_list', compact('data'));
    }

    public function bid_log(Request $request)
    {

        $data = DB::table('bids')
            ->select(
                'id',
                'user_id',
                'product_id',
                'bid_amount',
                'bid_credit',
                'created_at',
                'updated_at'
            )
            ->orderBy('id', 'desc') // Order by id in descending order, you can change this based on your requirement
            ->get();

        return view('backend.customers.bil_log', compact('data'));
    }

    public function bid_now(Request $request)
    {
        $request->validate([
            'bid_amount' => 'required|numeric',
            'product_id' => 'required|numeric',
        ]);

        $product_id = $request->product_id;
        $bid_amount = $request->bid_amount;

        $product = Product::find($product_id);

        if ($product->last_bidder_id != Auth::user()->id) {
            if ($product->status == "0") {
                // get $product amount_per_bid from database
                $amount_per_bid = $product->amount_per_bid;
                $credit_per_bid = $product->credit_per_bid;
                $last_bid_date = $product->last_bid_date;
                $last_bid_date1 = $product->last_bid_date;
                // check if user has enough credit to place bid
                $user = User::find(Auth::user()->id);
                $user_credit = $user->credits;
                if ($user_credit < $credit_per_bid) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Bid not placed. You do not have enough credit to place bid.',
                    ]);
                }
                // date_default_timezone_set('Asia/Kolkata');
                $reset_time_bid_sec = $product->reset_time_bid;
                $last_bid_time =   strtotime($last_bid_date);
                $last_bid_time_counter = $last_bid_time + 5;
                $end_time = date('Y-m-d H:i:s', $last_bid_time_counter);
                $current_time = strtotime(date('Y-m-d H:i:s'));
                if ($current_time < $last_bid_time_counter) {
                    // if(true){ 

                    $bid = new Bid();
                    $bid->user_id = Auth::user()->id;
                    $bid->product_id = $product_id;
                    $bid->bid_amount = $amount_per_bid;
                    $bid->save();
                    $bid1 = $bid->id;
                    // deduct credit from user
                    $user->credits = $user_credit - $credit_per_bid;
                    $user->save();

                    ////////

                    $d1 = new DateTime($last_bid_date1);
                    $d2 = new DateTime(date('Y-m-d H:i:s'));
                    $interval = $d1->diff($d2);
                    $diffInSeconds = $interval->s; //45
                    $diffInMinutes = $interval->i; //23
                    $diffInHours   = $interval->h; //8
                    $diffInDays    = $interval->d; //21
                    $diffInMonths  = $interval->m; //4
                    $diffInYears   = $interval->y; //1

                    if (
                        $diffInYears == 0 && $diffInMonths == 0 && $diffInDays == 0
                        && $diffInHours == 0 && $diffInMinutes == 0 && $diffInSeconds <= 20
                    ) {
                        //    dd("Yes", $diffInSeconds, $diffInMinutes, $diffInHours, $diffInDays, $diffInMonths, $diffInYears);
                        $product->last_bid_date = $end_time;
                    } else {
                        //   dd( "eeee",$diffInSeconds,$diffInMinutes, $diffInHours, $diffInDays, $diffInMonths, $diffInYears);
                    }


                    ///////
                    $product->last_bidder_name = Auth::user()->name;
                    //$product->last_bidder_id=Auth::user()->id;
                    $product->amount_per_bid = $product->amount_per_bid + $product->amount_per_bid_add;
                    $product->save();
                    // DB::enableQueryLog();

                    $updateProduct = Product::where('id', $product_id)
                        ->update([
                            'last_bid_date' => $end_time,
                            'last_bidder_name' => Auth::user()->name,
                            'last_bidder_id' => Auth::user()->id,
                            'amount_per_bid' => ($product->amount_per_bid + $product->amount_per_bid_add)
                        ]);
                    // dd(DB::getQueryLog());
                    $temp_array = [];
                    $this->cron_auto_bid($product_id, $amount_per_bid, $credit_per_bid, $temp_array);
                    // return as json
                    /* broadcast run code */
                    $productList = Product::findOrFail($product_id);

                    // Dispatch the NotifyUserRegistered event
                    event(new UpdateBidPrice($product));

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Bid placed successfully.',
                        'amount_per_bid' => $product->amount_per_bid,
                        'channel' => 'update-bid-price',
                    ]);
                } else {

                    return response()->json([
                        'status' => 'error',
                        'message' => 'Bid not placed. Product is not available due to time is expired.'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Bid not placed. Product is not available.'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Bid not placed. You are the last bidder.'
            ]);
        }
    }

    public function auto_bid_req(Request $request)
    {

        $request->validate([
            'StartRs' => 'required|numeric',
            'product_id' => 'required|numeric',
            // 'MaxBidCredit' => 'required|numeric',
        ]);

        $product_id = $request->product_id;
        $start_rs = (int)$request->StartRs;
        $MaxBidCredit = (int) $request->MaxBidCredit;
        $user = User::where('id', Auth::user()->id)->select("credits")->get();

        if ($user[0]->credits >= $MaxBidCredit) {
            $product = Auto_bid_user::where("product_id", $product_id)->where("user_id", Auth::user()->id)->get();
            if (count($product) <= 0) {

                //update user credit 
                $product = Auto_bid_user::insertGetId([
                    "user_id" => Auth::user()->id,
                    "product_id" => $product_id,
                    "credit_use_for_bid" => (int)$MaxBidCredit,
                    "stat_from_bid_price" => (int)$start_rs,
                    "created_at" => date("Y-m-d H:i:s")
                ]);

                $avi_credits = ($user[0]->credits - $MaxBidCredit);
                User::where("id", Auth::user()->id)->update(["credits" => $avi_credits]);

                $product = Product::find($product_id);
                // dd($product);
                $amount_per_bid = $product->amount_per_bid;
                $credit_per_bid = $product->credit_per_bid;
                $last_bid_date = $product->last_bid_date;
                // DB::enableQueryLog();
                Auto_bid_user::where('stat_from_bid_price', '<=', $amount_per_bid)
                    ->where("credit_use_for_bid", ">=", $credit_per_bid)
                    ->update(['bid_allow' => 1]);

                $auto_bid = $this->cron_auto_bid($product_id, $amount_per_bid, $credit_per_bid);

                $product = Product::find($product_id);
                $auto_bid["amount_per_bid"] = $product->amount_per_bid;
                return response()->json([
                    'data' => $auto_bid,
                    'status' => 'success',
                    'message' => 'Auto Bid is placed Sucessfully',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Bid not placed. You are already apply Auto bid on this product .',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Bid not placed. Credit is not available kindly check bid credit .',
            ]);
        }
    }
    public function cron_auto_bid($product_id, $amount_per_bid, $credit_per_bid, $temp_array = [])
    {
        // DB::enableQueryLog();

        $autoBidUser = Auto_bid_user::where("product_id", $product_id)
            ->where("credit_use_for_bid", ">=", (int) $credit_per_bid)
            ->where("stat_from_bid_price", "<=", (int) $amount_per_bid)
            ->where("bid_allow", 1)
            ->orderBy("created_at", "ASC")
            ->get();


        foreach ($autoBidUser as $key => $value) {

            $product = Product::find($product_id);

            // $amount_per_bid = $product->amount_per_bid;
            $credit_per_bid = $product->credit_per_bid;
            $last_bid_date = $product->last_bid_date;
            $product_bid_price = $product->amount_per_bid + $product->amount_per_bid_add;


            $reset_time_bid_sec = $product->reset_time_bid;
            $last_bid_time =   strtotime($last_bid_date);

            $last_bid_time_counter = $last_bid_time + $reset_time_bid_sec;
            $end_time = date('Y-m-d H:i:s', $last_bid_time_counter);
            $current_time = strtotime(date('Y-m-d H:i:s'));
            $user_credit = $value->credit_use_for_bid;
            // if($current_time < $last_bid_time_counter){ 

            //             $latest_bid = Bid::
            //                  where('user_id', $value->user_id)
            //                 ->where('product_id', $product_id)
            //                 ->orderBy('id',"desc")
            //                 ->limit(1)
            //                 ->get();
            //                  dd($latest_bid);
            //             if (count($latest_bid)>0 && $latest_bid[0]->user_id == $value->user_id) {
            //                 continue;
            //             }

            $bid = new Bid();
            $bid->user_id = $value->user_id;
            $bid->product_id = $product_id;
            $bid->bid_amount = $product_bid_price;
            $bid->bid_credit = $credit_per_bid;
            $bid->save();
            $bid1 = $bid->id;

            // deduct credit from user
            Auto_bid_user::where('user_id', $value->user_id)
                ->where('product_id', $product_id)
                ->update(['credit_use_for_bid' => ($user_credit - $credit_per_bid)]);

            $user = User::find($value->user_id);


            $d1 = new DateTime($last_bid_date);
            $d2 = new DateTime(date('Y-m-d H:i:s'));
            $interval = $d1->diff($d2);
            $diffInSeconds = $interval->s; //45
            $diffInMinutes = $interval->i; //23
            $diffInHours   = $interval->h; //8
            $diffInDays    = $interval->d; //21
            $diffInMonths  = $interval->m; //4
            $diffInYears   = $interval->y; //1

            if (
                $diffInYears == 0 && $diffInMonths == 0 && $diffInDays == 0
                && $diffInHours == 0 && $diffInMinutes == 0 && $diffInSeconds <= 20
            ) {
                //    dd("Yes", $diffInSeconds, $diffInMinutes, $diffInHours, $diffInDays, $diffInMonths, $diffInYears);
                $product->last_bid_date = $end_time;
            } else {
                //   dd( "eeee",$diffInSeconds,$diffInMinutes, $diffInHours, $diffInDays, $diffInMonths, $diffInYears);
            }


            $product->last_bid_date = $end_time;
            $product->last_bidder_name = $user->name;
            $product->last_bidder_id = $value->user_id;
            $product->amount_per_bid = $product_bid_price;
            $product->save();
            array_push($temp_array, $product_bid_price);

            // }
        }
        usleep(100000);

        if (count($autoBidUser) >= 2) {
            $this->cron_auto_bid($product_id, $product_bid_price, $credit_per_bid, $temp_array);
        }
        // dd(DB::getQueryLog());


        if (isset($user->name) && isset($product_bid_price) && isset($product_id)) {

            // $url="http://103.235.107.176/:3000/send_last_product_bid/?name=".$user->name."&amount_per_bid=".$amount_per_bid."&product_id=".$product_id."";

            // Http::get($url);
            //dd($url);        
            $data = [
                "name" => $user->name,
                "amount_per_bid" => max($temp_array),
                "product_id" => $product_id
            ];
        } else {
            $data = [
                "name" => "NA",
                "amount_per_bid" => "00",
                "product_id" => '1'
            ];
        }
        return $data;
    }

    public function bid_now_old(Request $request)
    {
        $request->validate([
            'bid_amount' => 'required|numeric',
            'product_id' => 'required|numeric',
        ]);

        $product_id = $request->product_id;
        $bid_amount = $request->bid_amount;

        $product = Product::find($product_id);

        if ($product->status == 0) {
            // get $product amount_per_bid from database
            $amount_per_bid = $product->amount_per_bid;
            $credit_per_bid = $product->credit_per_bid;



            // get last bid amount for this product
            $last_bid = Bid::where('product_id', $product_id)->orderBy('id', 'desc')->first();


            // check if user has enough credit to place bid
            $user = User::find(Auth::user()->id);
            $user_credit = $user->credits;
            if ($user_credit < $credit_per_bid) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Bid not placed. You do not have enough credit to place bid.',
                ]);
            }


            //validate  $last_bid
            if ($last_bid == null) {
                $last_bid = new \stdClass();
                $last_bid_amount_added = $amount_per_bid;
            } else {
                date_default_timezone_set('Asia/Kolkata');
                $reset_time_bid_sec = $product->reset_time_bid;
                $last_bid_time = strtotime(date('Y-m-d H:i:s', strtotime($last_bid->updated_at)));
                $last_bid_time_counter = $last_bid_time + $reset_time_bid_sec;
                $end_time = date('Y-m-d H:i:s', $last_bid_time_counter);
                $current_time = strtotime(date('Y-m-d H:i:s'));
                $last_bid_time_counter = $last_bid_time + $reset_time_bid_sec;


                if ($current_time < $last_bid_time_counter) {
                    $last_bid_amount_added = $amount_per_bid + $last_bid->bid_amount;
                    $last_bid_user_id = $last_bid->user_id;

                    if ($last_bid_user_id == Auth::user()->id) {
                        return response()->json([
                            'status' => 'error',


                            'message' => 'Bid not placed. You are already highest bidder.',
                        ]);
                    }
                } else {
                    $last_bid_amount_added = $amount_per_bid;
                }
            }

            $bid = new Bid();
            $bid->user_id = Auth::user()->id;
            $bid->product_id = $product_id;
            $bid->bid_amount = $last_bid_amount_added;
            $bid->save();

            // deduct credit from user
            $user->credits = $user_credit - $credit_per_bid;
            $user->save();

            $bid = Bid::where('product_id', $product_id)->orderBy('id', 'desc')->first();

            // return as json
            return response()->json([
                'status' => 'success',
                'message' => 'Bid placed successfully.',
                'bid' => $bid,
            ]);

            // return redirect()->back()->with('success', 'Bid placed successfully.');
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Bid not placed. Product is not available.',
            ]);
        }
    }

    public function topup_bid_credits()
    {
        return view('frontend.bid-topup.list');
    }

    public function topup_bid_credits_detail($id)
    {
        $this->removeCoupon();
        return view('frontend.bid-topup.detail', compact('id'));
    }

    /*public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $cartTotal = $request->cost; // Replace with your cart total calculation logic

        $coupon = DB::table('coupons')->where('code', $couponCode)
            ->where('is_enabled', true)
            ->first();

        if ($coupon) {
            $discountAmount = $coupon->discount_type === 'percentage'
                ? ($coupon->discount / 100) * $cartTotal
                : $coupon->discount;

            $newTotal = $cartTotal - $discountAmount;
            
            $response = [
                'success' => true,
                'message' => 'Coupon applied successfully',
                'discount' => $discountAmount,
                'new_total' => $newTotal,
            ];
            
            session([
                'coupon_id'        => $coupon->id,
                'coupon_success'   => $response['success'],
                'coupon_discount'  => $response['discount'],
                'coupon_new_total' => $response['new_total'],
            ]);
            
            return response()->json($response, 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code'], 200);
        }
    }*/

    /*public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $cartTotal = $request->input('cost'); // Make sure you use input() to retrieve data from the request
    
        $coupon = DB::table('coupons')
            ->where('code', $couponCode)
            ->where('is_enabled', true)
            ->whereDate('valid_from', '<=', now()) // Check if the coupon is valid from now
            ->whereDate('valid_until', '>=', now()) // Check if the coupon is still valid
            ->first();
    
        if ($coupon) {
            $discountAmount = $coupon->discount_type === 'percentage'
                ? ($coupon->discount / 100) * $cartTotal
                : $coupon->discount;
    
            $newTotal = $cartTotal - $discountAmount;
    
            $response = [
                'success' => true,
                'message' => 'Coupon applied successfully',
                'discount' => $discountAmount,
                'new_total' => $newTotal,
            ];
    
            session([
                'coupon_id' => $coupon->id,
                'coupon_success' => $response['success'],
                'coupon_discount' => $response['discount'],
                'coupon_new_total' => $response['new_total'],
            ]);
    
            return response()->json($response, 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code'], 200);
        }
    }*/

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $cartTotal = $request->input('cost'); // Make sure you use input() to retrieve data from the request

        $coupon = DB::table('coupons')
            ->where('code', $couponCode)
            ->where('is_enabled', true)
            ->whereDate('valid_from', '<=', now()) // Check if the coupon is valid from now
            ->whereDate('valid_until', '>=', now()) // Check if the coupon is still valid
            ->first();

        if ($coupon) {
            if ($coupon->total_usage < $coupon->max_usage) { // Assuming there's a 'max_usage' column
                $discountAmount = $coupon->discount_type === 'percentage'
                    ? ($coupon->discount / 100) * $cartTotal
                    : $coupon->discount;

                $newTotal = $cartTotal - $discountAmount;

                $response = [
                    'success' => true,
                    'message' => 'Coupon applied successfully',
                    'discount' => $discountAmount,
                    'new_total' => $newTotal,
                ];

                session([
                    'coupon_id' => $coupon->id,
                    'coupon_success' => $response['success'],
                    'coupon_discount' => $response['discount'],
                    'coupon_new_total' => $response['new_total'],
                ]);

                // Update the total_usage in the database
                DB::table('coupons')->where('id', $coupon->id)->increment('total_usage');

                return response()->json($response, 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Coupon usage limit exceeded'], 200);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code'], 200);
        }
    }

    public function removeCoupon()
    {

        session([
            'coupon_id'        => null,
            'coupon_success'   => null,
            'coupon_discount'  => null,
            'coupon_new_total' => null,
        ]);
    }

    public function buy_topup_credits($method, $id)
    {

        $bidPack = DB::table('bids_packs')->where('id', $id)->first();
        $coupon  = DB::table('coupons')->where('id', session('coupon_id'))->first();

        if ($method == 'ccavenue') {
            $orderId = DB::table('orders')->insertGetId([
                'user_id'      => auth()->user()->id,
                'total'        => $bidPack->cost,
                'discount'     => session('coupon_discount') ? session('coupon_discount') : 0,
                'amount'       => session('coupon_new_total') ? session('coupon_new_total') : $bidPack->cost,
                'payment_id'   => time() . auth()->user()->id,
                'order_type'   => 'topup_credit',
                'order_status' => 'pending',
                'product_info' => json_encode($bidPack),
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

    public function topup_credit_payment_done($paymentId, $payment)
    {
        $order = DB::table('orders')->where('payment_id', $paymentId)->first();
        $user  = DB::table('users')->where('id', $order->user_id)->first();

        $updateOrder = DB::table('orders')->where('id', $order->id)->update([
            'payment_info' => $payment,
            'order_status' => 'success'
        ]);

        DB::table('users')->where('id', '=', $user->id)->update([
            'credits' => DB::raw('credits + ' . json_decode($order->bidpack_info)->total_credit)
        ]);

        return redirect()->route('profile.customer_profile_dashboard')->withSuccess('Topup Credit successfully added to your wallet!');
    }




    public function latest_bidder(Request $request)
    {

        $product_id = $request->product_id;

        $product = Product::find($product_id);
        $last_bid = DB::table('bids')->where('product_id', $product_id)->orderBy('id', 'desc')->first();
        //validate  $last_bid
        if ($last_bid == null) {
            $last_bid = new \stdClass();
            $product->last_bid_amount = 0;
            $product->last_bid_time = $product->created_at;
            $product->last_bid_user_name = '';
        } else {

            $product->last_bid_time = date('Y-m-d H:i:s', strtotime($last_bid->updated_at));
            $product->last_bid_amount = $last_bid->bid_amount;
            $last_bid_user_id = $last_bid->user_id;
            $last_bid_user = DB::table('users')->where('id', $last_bid_user_id)->first();
            $product->last_bid_user_name = $last_bid_user->name;
        }
        //return as json
        return response()->json([
            'status' => 'success',
            'message' => 'Latest bidder fetched successfully.',
            'product' => $product,
        ]);
    }
}
