<?php

// namespace App\Http\Controllers\Payment;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Srmklive\PayPal\Services\PayPal as PayPalClient;
// use App\Models\Product;
// use App\Models\Payment;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;

// class PayPalController extends Controller
// {
//     public function index()
//     {
//         return view('frontend.paypal.paypal');
//     }

//     public function payment($id)
//     {
//         try {
//             $product = Product::findOrFail($id);

//             $usdAmount = round($product->retail_price / 83, 2); // INR → USD approx

//             $paypal = new PayPalClient;
//             $paypal->setApiCredentials(config('paypal'));
//             $paypal->setAccessToken($paypal->getAccessToken());

//             $order = $paypal->createOrder([
//                 'intent' => 'CAPTURE',
//                 'application_context' => [
//                     'return_url' => route('paypal.payment.success'),
//                     'cancel_url' => route('paypal.payment.cancel'),
//                 ],
//                 'purchase_units' => [[
//                     'reference_id' => uniqid(),
//                     'custom_id' => $product->id,
//                     'description' => $product->product_title,
//                     'amount' => [
//                         'currency_code' => 'USD',
//                         'value' => $usdAmount,
//                     ],
//                 ]],
//             ]);

//             if (!isset($order['links'])) {
//                 Log::error('PayPal order creation failed', $order);
//                 dd($order);
//                 return redirect()->route('paypal')->with('error', 'Unable to create PayPal order.');
//             }

//             foreach ($order['links'] as $link) {
//                 if ($link['rel'] === 'approve') {
//                     return redirect()->away($link['href']);
//                 }
//             }

//             return redirect()->route('paypal')->with('error', 'No approval URL found.');
//         } catch (\Exception $e) {
//             Log::error('PayPal payment() error: ' . $e->getMessage());
//             return redirect()->route('paypal')->with('error', 'Something went wrong while initiating payment.');
//         }
//     }

//     public function paymentSuccess(Request $request)
//     {
//         try {
//             $token = $request->input('token');

//             if (!$token) {
//                 return redirect()->route('paypal')->with('error', 'Missing token');
//             }

//             $paypal = new PayPalClient;
//             $paypal->setApiCredentials(config('paypal'));
//             $paypal->setAccessToken($paypal->getAccessToken());

//             $response = $paypal->capturePaymentOrder($token);

//             if ($response['status'] === 'COMPLETED') {
//                 $capture      = $response['purchase_units'][0]['payments']['captures'][0];
//                 $transactionId = $response['id'];
//                 $productId     = $response['purchase_units'][0]['custom_id'];
//                 $amount        = $capture['amount']['value'];
//                 $currency      = $capture['amount']['currency_code'];
//                 $status        = $response['status'];

//                 $userId    = Auth::check() ? Auth::id() : 'guest_' . uniqid();
//                 $userEmail = Auth::check() ? Auth::user()->email : 'guest@example.com';

//                 $exists = DB::table('payments')->where('transaction_id', $transactionId)->exists();

//                 if (!$exists) {
//                     Payment::create([
//                         'transaction_id' => $transactionId,
//                         'product_id'     => $productId,
//                         'user_id'        => $userId,
//                         'user_email'     => $userEmail,
//                         'amount'         => $amount,
//                         'currency'       => $currency,
//                         'status'         => $status,
//                         'payment_method' => 'paypal',
//                     ]);
//                 }

//                 return view('frontend.paypal.paypal', [
//                     'payment' => [
//                         'transaction_id' => $transactionId,
//                         'user_email'     => $userEmail,
//                         'amount'         => $amount,
//                         'currency'       => $currency,
//                         'status'         => $status,
//                         'payment_date'   => Carbon::now()->format('Y-m-d H:i:s'),
//                     ]
//                 ]);
//             }

//             return redirect()->route('paypal')->with('error', 'Payment was not completed.');
//         } catch (\Exception $e) {
//             Log::error('PayPal paymentSuccess() error: ' . $e->getMessage());
//             return redirect()->route('paypal')->with('error', 'Payment capture failed.');
//         }
//     }

//     public function paymentCancel()
//     {
//         return redirect()->route('paypal')->with('error', 'Payment was cancelled.');
//     }
// }


namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PayPalController extends Controller
{
    public function index()
    {
        return view('frontend.paypal.paypal');
    }

    public function payment($id)
    {
        try {
            $product = Product::findOrFail($id);
            // $usdAmount = round($product->retail_price / 83, 2); // INR to USD approx

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            $order = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('paypal.payment.success'),
                    'cancel_url' => route('paypal.payment.cancel'),
                ],
                'purchase_units' => [[
                    'reference_id' => uniqid(),
                    'custom_id' => $product->id,
                    'description' => $product->product_title,
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $product->retail_price,
                    ],
                ]],
            ]);

            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }

            Log::error('PayPal Approval URL not found', $order);
            return redirect()->route('paypal')->with('error', 'PayPal approval link not found.');
        } catch (\Throwable $e) {
            Log::error('PayPal payment error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return redirect()->route('paypal')->with('error', 'Payment initiation failed.');
        }
    }

    public function paymentSuccess(Request $request)
    {
        try {
            $token = $request->get('token');
            if (!$token) return redirect()->route('paypal')->with('error', 'Missing PayPal token.');

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            $response = $provider->capturePaymentOrder($token);

            if ($response['status'] === 'COMPLETED') {
                $capture = $response['purchase_units'][0]['payments']['captures'][0];

                $payment = Payment::firstOrCreate(
                    ['transaction_id' => $response['id']],
                    [
                        'product_id'     => $response['purchase_units'][0]['custom_id'],
                        'user_id'        => Auth::check() ? Auth::id() : 'guest_' . uniqid(),
                        'user_email'     => Auth::check() ? Auth::user()->email : 'guest@example.com',
                        'amount'         => $capture['amount']['value'],
                        'currency'       => $capture['amount']['currency_code'],
                        'status'         => $response['status'],
                        'payment_method' => 'paypal',
                    ]
                );

                return view('frontend.paypal.paypal', [
                    'payment' => [
                        'transaction_id' => $payment->transaction_id,
                        'user_email'     => $payment->user_email,
                        'amount'         => $payment->amount,
                        'currency'       => $payment->currency,
                        'status'         => $payment->status,
                        'payment_date'   => Carbon::parse($payment->created_at)->format('Y-m-d H:i:s'),
                    ]
                ]);
            }

            return redirect()->route('paypal')->with('error', 'Payment was not completed.');
        } catch (\Throwable $e) {
            Log::error('PayPal capture error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return redirect()->route('paypal')->with('error', 'Payment capture failed.');
        }
    }

    public function paymentCancel()
    {
        return redirect()->route('paypal')->with('error', 'Payment was cancelled.');
    }
}