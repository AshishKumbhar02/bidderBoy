<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BiddingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use App\Models\Order; 
use App\Http\Controllers\CheckoutController;

use Session;
use Redirect;
use Carbon\Carbon;


class CcavenueController extends Controller
{

    public function pay($orderId)
    {
        //order details
        $order = DB::table('orders')->where('id', $orderId)->first();
        $user  = DB::table('users')->where('id', $order->user_id)->first();

        //payment gateway environment    
        $formUrl =  env('CCAVENUE_PRODUCTION');

        //ccavenue form data
        $params =
            [
                'tid'                 => $order->payment_id,
                'merchant_id'         => env('CCAVENUE_MERCHANT_ID'),
                'order_id'            => $order->payment_id,
                'amount'              => $order->amount,
                'currency'            => 'INR',
                'redirect_url'        => route('ccavenue.response', 1),
                'cancel_url'          => route('ccavenue.cancel', 1),
                'language'            => 'EN',
                'billing_name'        => $user->first_name,
                'billing_address'     => $user->address ? $user->address : '-',
                //'billing_city'        => 'mumbai',
                //'billing_state'       => 'maharashtra',
                //'billing_zip'         => '400008',
                //'billing_country'     => 'india',
                'billing_tel'         => $user->mobile_number ? $user->mobile_number : '9999999999',
                'billing_email'       => $user->email  ? $user->email  : 'customer@bidderboy.com',
                'delivery_name'       => $user->first_name,
                'delivery_address'    => $user->address ? $user->address : '-',
                //'delivery_city'       => 'mumbai',
                //'delivery_state'      => 'maharashtra',
                //'delivery_zip'        => '400008',
                //'delivery_country'    => 'india',
                'delivery_tel'        => $user->mobile_number ? $user->mobile_number : '9999999999',
                'merchant_param1'     => $orderId,
                'merchant_param2'     => $user->id,
                'merchant_param3'     => '-',
                'merchant_param4'     => 'topup_credit_payment',
                'merchant_param5'     => '-',
                'promo_code'          => '',
                'customer_identifier' => '',
            ];

        $merchant_data = '';
        foreach ($params as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }

        $encrypted_data = $this->encrypt($merchant_data, env('CCAVENUE_KEY'));
        $access_code = env('CCAVENUE_CODE');

        //pass all from data to view
        return view('frontend.ccavenue.order_payment_Ccavenue', compact('encrypted_data', 'formUrl', 'access_code'));
    }

    public function paymentResponse(Request $request)
    {
        $paymentDetails = $this->extractPaymentDetail($_POST);

        $orderId         = explode('=', $paymentDetails[0])[1];
        $orderStatus     = explode('=', $paymentDetails[3])[1];
        $paymentType     = explode('=', $paymentDetails[29])[1];
        $userId          = explode('=', $paymentDetails[27])[1];

        //relogin if user session lost
        if (!Auth::user()) {
            Auth::loginUsingId($userId);
        }

        if ($orderStatus === "Success") {
            if ($paymentType == 'topup_credit_payment') { //topup_credit_payment
                return (new BiddingController)->topup_credit_payment_done($orderId, json_encode($paymentDetails));
            }
        } else {
            //return $this->paymentFailure($request, $orderStatus);
            return redirect(route('ccavenue.paymentFailure', ['orderStatus' => $orderStatus, 'orderId' => $orderId]));
        }
    }

    public function paymentFailure($orderStatus, $orderId)
    {
        if ($orderStatus === "Aborted") {
            $message = "Thank you for shopping with us.We will keep you posted regarding the status of your order through E-mail & SMS";
        } elseif ($orderStatus === "Failure") {
            $message = "Thank you for shopping with us.However,the transaction has been declined.";
        } else {
            $message = "Security Error. Illegal access detected";
        }

        return view('frontend.ccavenue.failure', compact('message', 'orderId'));
    }

    public function paymentCancel(Request $request)
    {
        $paymentDetails = $this->extractPaymentDetail($_POST);
        $userId = explode('=', $paymentDetails[27])[1];

        //relogin if user session lost
        if (!Auth::user()) {
            Auth::loginUsingId($userId);
        }

        //session()->flash('Payment cancelled')->warning();
        return redirect()->route('/')->withError('Payment Cancelled!');
    }

    public function paymentWebhook1(Request $request)
    {

        //here is my working code
        $paymentDetails  = $this->extractPaymentDetail($_POST);
        $orderId         = explode('=', $paymentDetails[0])[1];
        $orderStatus     = explode('=', $paymentDetails[3])[1];
        $paymentType     = explode('=', $paymentDetails[29])[1];
        $combinedOrderId = explode('=', $paymentDetails[28])[1];
        $userId          = explode('=', $paymentDetails[27])[1];

        //This code is just to check if webhook is working or not (it make .txt file in public HTML)
        $filename = "public/webhook/" . $orderId . date('Y-m-d-H-i-s') . ".txt";
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = json_encode($paymentDetails);
        fwrite($myfile, $txt);
        fclose($myfile);

        if ($orderStatus === "Success") {
            if ($paymentType == 'cart_payment') { //cart_payment
                $order = Order::where('combined_order_id', $combinedOrderId)->first();
                if (isset($order->payment_status)) {
                    if ($order->payment_status == 'unpaid') {
                        return (new CheckoutController)->checkout_done($combinedOrderId, json_encode($paymentDetails));
                    }
                }
            }
        }
    }

    public function extractPaymentDetail($post)
    {
        $workingKey     = env('CCAVENUE_KEY'); //Working Key
        $encResponse    = $post["encResp"]; //response sent by the CCAvenue Server
        $rcvdString     = $this->decrypt($encResponse, $workingKey);    //Crypto Decryption used as per the specified working key.
        $order_status   = "";
        $decryptValues  = explode('&', $rcvdString);
        $dataSize       = sizeof($decryptValues);

        $paymentDetails = [];
        for ($i = 0; $i < $dataSize; $i++):
            $paymentDetails[] = $decryptValues[$i];
        endfor;

        return $paymentDetails;
    }


    /*
    * @param1 : Plain String
    * @param2 : Working key provided by CCAvenue
    * @return : Decrypted String
    */
    public function encrypt($plainText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }

    /*
    * @param1 : Encrypted String
    * @param2 : Working key provided by CCAvenue
    * @return : Plain String
    */
    public function decrypt($encryptedText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }

    public function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;

        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }

            $count += 2;
        }
        return $binString;
    }
}

