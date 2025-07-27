<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Product;
use Carbon\Carbon;

class PayPalController extends Controller
{
    public function index()
    {
        return view('frontend.paypal.paypal');
    }

    public function payment($id)
    {
        // ✅ Step 1: Fetch product
        $product = Product::findOrFail($id);
        $totalInr = $product->retail_price;
        $usdPrice = round($totalInr / 83, 2); // No minimum USD

        // ✅ Step 2: Setup PayPal
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $accessToken = $paypal->getAccessToken();
        $paypal->setAccessToken($accessToken);

        // ✅ Step 3: Create PayPal Order
        $order = $paypal->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.payment.success'), // GET first
                'cancel_url' => route('paypal.payment.cancel'),
            ],
            'purchase_units' => [[
                'reference_id' => uniqid('ref_'),
                'custom_id' => $product->id,
                'description' => $product->product_title,
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => $usdPrice,
                ],
            ]]
        ]);

        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->route('paypal')->with('error', 'Unable to redirect to PayPal.');
    }

    public function paymentCancel()
    {
        return redirect()->route('paypal')->with('error', 'Payment was cancelled.');
    }

    // ✅ STEP 1 — GET handler for PayPal redirect
    public function handleRedirect(Request $request)
    {
        $token = $request->get('token');

        if (!$token) {
            return redirect()->route('paypal')->with('error', 'Missing token in PayPal redirect.');
        }

        // ✅ Redirect to POST securely via auto-submitting form
        return view('frontend.paypal.forward', ['token' => $token]);
    }

    // ✅ STEP 2 — Secure POST handler for capturing payment
    public function paymentSuccess(Request $request)
    {
        $token = $request->input('token'); // 👈 Now using POST

        if (!$token) {
            return redirect()->route('paypal')->with('error', 'Missing token in PayPal response.');
        }

        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $accessToken = $paypal->getAccessToken();
        $paypal->setAccessToken($accessToken);

        $response = $paypal->capturePaymentOrder($token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            // ✅ Optional: Avoid duplicate transactions
            $exists = DB::table('payments')->where('transaction_id', $response['id'])->exists();

            if (!$exists) {
                DB::table('payments')->insert([
                    'transaction_id' => $response['id'],
                    'product_id' => $response['purchase_units'][0]['custom_id'],
                    'payer_name' => $response['payer']['name']['given_name'] . ' ' . $response['payer']['name']['surname'],
                    'payer_email' => $response['payer']['email_address'],
                    'amount' => $capture['amount']['value'],
                    'currency' => $capture['amount']['currency_code'],
                    'status' => $response['status'],
                    'payment_method' => 'paypal',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('frontend.paypal.paypal', [
                'payment' => [
                    'transaction_id' => $response['id'],
                    'payer_name' => $response['payer']['name']['given_name'] . ' ' . $response['payer']['name']['surname'],
                    'payer_email' => $response['payer']['email_address'],
                    'amount' => $capture['amount']['value'],
                    'currency' => $capture['amount']['currency_code'],
                    'status' => $response['status'],
                    'payment_date' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            ]);
        }

        return redirect()->route('paypal')->with('error', 'Payment capture failed.');
    }
}
