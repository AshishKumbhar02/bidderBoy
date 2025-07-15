<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Mail;

class EmailUtility
{
    public static function sendHtmlEmail($recipient, $subject, $view, $data)
    {
        Mail::send($view, $data, function ($message) use ($recipient, $subject) {
            $message->to($recipient)
                ->subject($subject);
        });
    }
    
    public static function sendTextEmail($recipient, $subject, $message)
    {
        Mail::raw($message, function ($m) use ($recipient, $subject) {
            $m->to($recipient)
              ->subject($subject);
        });
    }    
}