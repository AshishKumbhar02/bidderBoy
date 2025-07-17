<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\OtpAttempt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Utilities\Fast2SMSUtility;
use App\Utilities\EmailUtility;
use Illuminate\Support\Facades\DB;


// use Mail;
// use Illuminate\Support\str;
// use Illuminate\Support\Carbon;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        // Only guests can access except for logout and dashboard
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }



    /**
     * Show the registration form.
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration with OTP verification.
     */
    public function store(Request $request)
    {
        // Step 1: Validate input and send OTPs
        if (session()->get('rstep') == 1) {

            // Validate registration form
            $request->validate([
                'first_name'    => 'required|string|max:250',
                'last_name'     => 'required|string|max:250',
                'username'      => 'required|max:250|unique:users',
                'email'         => 'required|email|max:250|unique:users',
                'mobile_number' => 'required|string|unique:users',
                'password'      => 'required|min:8'
            ]);
            $mobileNumber = str_replace(' ', '', $request->mobile_number);
            $attempts = OtpAttempt::checkAttempts($mobileNumber);

            if (!$attempts) {
                return json_encode(['success' => false, 'rstep' => 1, 'message' => 'Maximum OTP attempts exceeded']);
            }

            // Generate OTPs
            $smsOtp = rand(111111, 999999);
            $emailOtp = rand(111111, 999999);

            // Store OTPs in session
            session()->put('r_sms_otp', $smsOtp);
            session()->put('r_email_otp', $emailOtp);

            $verification = 'email';

            if (\App\Models\BusinessSetting::getSetting('fast2sms_registration_otp') == 'on') {
                if (substr($mobileNumber, 0, 3) == "+91") {
                    Fast2SMSUtility::sendOtp(str_replace('+91', '', $mobileNumber), $smsOtp);
                    $verification = 'email-sms';
                }
            }

            // Send email OTP
            EmailUtility::sendTextEmail($request->email, 'Bidder Boy Registration OTP', "Your OTP for regitration is $emailOtp");

            // Store session data for next step
            session()->put('r_mobile_number', $request->mobile_number);
            session()->put('r_email', $request->email);
            session()->put('verification', $verification);
            session()->put('r_user_data', $request->all());
            session()->put('rstep', 2);

            return json_encode(['success' => true, 'rstep' => 1, 'verification' => $verification, 'message' => 'OTP sent']);
        }
        // Step 2: Verify OTPs and register user
        elseif (session()->get('rstep') == 2) {
            $userSmsOtp = session()->get('r_sms_otp');
            $userEmailOtp = session()->get('r_email_otp');

            // Validate OTPs
            if (session()->get('verification') == 'email-sms') {
                if (empty($request->sms_otp) || $request->sms_otp != $userSmsOtp) {
                    return response()->json(['success' => false, 'rstep' => 2, 'message' => 'Invalid SMS OTP']);
                }
            }

            if (empty($request->email_otp) || $request->email_otp != $userEmailOtp) {
                return response()->json(['success' => false, 'rstep' => 2, 'message' => 'Invalid Email OTP']);
            }

            // Verify input matches session
            if (session()->get('r_mobile_number') != $request->mobile_number || session()->get('r_email') != $request->email) {
                return response()->json(['success' => false, 'rstep' => 2, 'message' => 'Invalid Request']);
            }

            // Create user
            $userData = session()->get('r_user_data');
            $user = User::create([
                'first_name'    => $userData['first_name'],
                'last_name'     => $userData['last_name'],
                'username'      => $userData['username'],
                'name'          => $userData['first_name'] . ' ' . $userData['last_name'],
                'email'         => $userData['email'],
                'mobile_number' => $userData['mobile_number'],
                'password'      => Hash::make($userData['password']),
                'ip_address'    => $request->ip(),
            ]);

            // Apply referral credits if any
            if (session()->get('referral')) {
                DB::table('credits')->insert([
                    'user_id' => session()->get('referral'),
                    // 'referred_id' => $lastInsertId,
                    'referred_id' => $user->id,
                    'credits' => 10,
                    'status' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }

            // Clear registration session
            session()->forget(['rstep', 'r_sms_otp', 'r_email_otp', 'r_user_data', 'r_mobile_number', 'r_email', 'verification']);

            return response()->json([
                'success' => true,
                'rstep' => 2,
                'message' => 'Registration successful! Please log in.'
            ]);
        }
        // If step not matched, fallback
        return response()->json(['success' => false, 'message' => 'Invalid registration step']);
    }

    /**
     * Show login form.
     */
    public function login(Request $request)
    {

        //set step 1
        session()->put('rstep', 1);
        session()->put('referral', $request->referral);

        return view('frontend.login');
    }

    /**
     * Authenticate user via email or username.
     */
    public function authenticate(Request $request)
    {
        $user = Auth::user();

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Try email
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user && $user->is_active == 0) {
                return $this->logout2();
            }
            return redirect()->route('/')->withSuccess('You have successfully logged in!');
        }

        // Try username
        $usernameCredentials = ['username' => $credentials['email'], 'password' => $credentials['password']];
        if (Auth::attempt($usernameCredentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user && $user->is_active == 0) {
                return $this->logout2();
            }
            return redirect()->route('/')->withSuccess('You have successfully logged in!');
        }
        return back()->withErrors(['email' => 'Your provided credentials do not match our records.'])->onlyInput('email');
    }

    /**
     * Display dashboard if authenticated.
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Log out current user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    /**
     * Log out and show inactive message.
     */
    public function logout2()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')
            ->with('error', 'Your account is inactive!');
    }

    /**
     * Send OTP to the provided mobile number.
     */
    public function sendOtp(Request $request)
    {
        // Validate mobile number
        $request->validate([
            'mobile_number' => 'required|string|min:10|max:15'
        ]);

        $phoneNumber = $request->input('mobile_number');

        // Generate 6-digit OTP
        $otp = rand(100000, 999999);

        // Send OTP via Fast2SMS utility
        $fast2sms = new Fast2SMSUtility();
        $response = $fast2sms->sendOtp($phoneNumber, $otp);

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully.'
        ]);
    }
}
