<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Utilities\EmailUtility;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the admin login page.
    public function index()
    {
        return view('backend.login');
    }

    // Handle admin login request.
    public function postLogin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate using admin guard
        $authenticated = Auth::guard('admins')->attempt($request->only(['email', 'password']));

        if ($authenticated) {
            return redirect('admin/dashboard');  // Successful login, redirect to dashboard
        } else {
            return redirect()->back()->withErrors(['invalid_credential' => 'Credential is invalid!']);  // Failed login attempt
        }
    }

    // Logout the currently authenticated admin.
    public function Logout()
    {
        Auth::guard('admins')->logout();  // Log out from admin guard
        return redirect()->route('admin.login'); // Redirect to login page
    }

    // Show the forgot password page.
    public function forgot_password()
    {
        return view('backend.forgot_password');
    }

    // Handle forgot password form submission.
    public function post_forgot_password(Request $request)
    {
        // // Validate the email field
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the admin exists with the provided email
        $admin = DB::table('admins')->where('email', $request->email)->first();

        if (!$admin) {
            // Admin not found with that email
            return redirect()->back()->withErrors([
                'invalid_credential' => 'Email is Invalid!'
            ]);
        } else {
            // Generate a new temporary password
            $newPassword = rand(111111, 999999);

            // Update admin's password in the database (hashed)
            DB::table('admins')
                ->where('email', $request->email)
                ->update([
                    'password' => Hash::make($newPassword),
                ]);

            // Send the new password via email
            EmailUtility::sendTextEmail(
                $request->email,
                'Bidder Boy Admin forgot password',
                "Your new admin password is $newPassword"
            );

            return redirect()->back()->with('success', 'Password email sent successfully.');
        }
    }
}
