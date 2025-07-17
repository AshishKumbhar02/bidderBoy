<?php

namespace App\Utilities;

use GuzzleHttp\Client;

class Fast2SMSUtility
{
    protected $apiKey;
    protected $senderId;
    protected $client;

    public function __construct()
    {
        $this->apiKey = "Ar4meE65JQhYzcl7kGg0FXjLIDOf1oPipC32wuUZVKHxWRMdtqKBtwcLzAD8rkoSRJiMfeVF250UGhZE";
        $this->senderId = env('FAST2SMS_SENDER_ID');
        $this->client = new Client();
    }

    public static function sendOtp($numbers, $otp)
    {
        $authorization = 'LKj3nYqHtMOGC8UXeFWARPobxpVJahwTr9vS5uZ2Ifkd4cl7N0TOi8yMZHFeWsEpXk76D2hYxNnrGov4';
        $route = 'otp';
        $variables_values = $otp;
        $flash = '0';
        $numbers = $numbers;

        $url = 'https://www.fast2sms.com/dev/bulkV2';
        $queryString = http_build_query([
            'authorization' => $authorization,
            'route' => $route,
            'variables_values' => $variables_values,
            'flash' => $flash,
            'numbers' => $numbers,
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url . '?' . $queryString,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
