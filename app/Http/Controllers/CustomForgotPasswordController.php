<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class CustomForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $status = Password::sendResetLink($request->only('email'));
        if ($status == Password::RESET_LINK_SENT) {
            // return back()->with(['status' => __($status)]);
            return     json_encode(['success' => true, 'message' => __($status)]);
        }
        // return back()->withErrors(['email' => __($status)]);
        return     json_encode(['success' => false, 'message' => __($status)]);
    }
    
    // Reset Password Using Token
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }
        return back()->withErrors(['email' => [__($status)]]);
    }
}
