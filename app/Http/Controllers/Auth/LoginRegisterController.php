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
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }




    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:250',
            'last_name'     => 'required|string|max:250',
            'username'      => 'required|max:250|unique:users',
            'email'         => 'required|email|max:250|unique:users',
            'mobile_number' => 'required|string|unique:users',
            'password'      => 'required|min:8'
        ]);

        if (session()->get('rstep') == 1) {
            $mobileNumber = str_replace(' ', '', $request->mobile_number);
            $attempts = OtpAttempt::checkAttempts($mobileNumber);

            if (!$attempts) {
                return json_encode(['success' => false, 'rstep' => 1, 'message' => 'Maximum OTP attempts exceeded']);
            }

            //send sms otp

            // Default OTP
            // $smsOtp = 1234;
            // $emailOtp = 123456;

            $smsOtp = rand(111111, 999999);
            $emailOtp = rand(111111, 999999);

            session()->put('r_sms_otp', $smsOtp);
            session()->put('r_email_otp', $emailOtp);

            $verification = 'email';

            if (\App\Models\BusinessSetting::getSetting('fast2sms_registration_otp') == 'on') {
                if (substr($mobileNumber, 0, 3) == "+91") {
                    Fast2SMSUtility::sendOtp(str_replace('+91', '', $mobileNumber), $smsOtp);
                    $verification = 'email-sms';
                }
            }

            // send email otp
            // $emailOtp = rand(111111, 999999);
            EmailUtility::sendTextEmail($request->email, 'Bidder Boy Registration OTP', "Your OTP for regitration is $emailOtp");

            //set step 2
            session()->put('r_mobile_number', $request->mobile_number);
            session()->put('r_email', $request->email);
            session()->put('verification', $verification);
            session()->put('r_user_data', $request->all());
            session()->put('rstep', 2);

            return json_encode(['success' => true, 'rstep' => 1, 'verification' => $verification, 'message' => 'OTP sent']);
        } elseif (session()->get('rstep') == 2) {
            $userSmsOtp = session()->get('r_sms_otp');
            $userEmailOtp = session()->get('r_email_otp');

            if (session()->get('verification') == 'email-sms') {
                if (empty($request->sms_otp) || $request->sms_otp != $userSmsOtp) {
                    return response()->json(['success' => false, 'rstep' => 2, 'message' => 'Invalid SMS OTP']);
                }
            }

            if (empty($request->email_otp) || $request->email_otp != $userEmailOtp) {
                return response()->json(['success' => false, 'rstep' => 2, 'message' => 'Invalid Email OTP']);
            }

            if (session()->get('r_mobile_number') != $request->mobile_number || session()->get('r_email') != $request->email) {
                return response()->json(['success' => false, 'rstep' => 2, 'message' => 'Invalid Request']);
            }

            // $user = User::create([
            //     'first_name'    => $request->first_name,
            //     'last_name'     => $request->last_name,
            //     'name'          => $request->first_name . ' ' . $request->last_name,
            //     'username'      => $request->username,
            //     'email'         => $request->email,
            //     'mobile_number' => $request->mobile_number,
            //     'password'      => Hash::make($request->password),
            //     'ip_address'    => request()->ip(),
            // ]);
            // $lastInsertId = $user->id;

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

            //request credit
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

            // $credentials = $request->only('email', 'password');
            // Auth::attempt($credentials);
            // $request->session()->regenerate();
            // return json_encode(['success' => true, 'rstep' => 2]);

            // Auth::login($user);
            session()->forget(['rstep', 'r_sms_otp', 'r_email_otp', 'r_user_data', 'r_mobile_number', 'r_email', 'verification']);
            return response()->json([
                'success' => true,
                'rstep' => 2,
                'message' => 'Registration successful! Please log in.'
            ]);

            // return response()->json(['success' => true, 'rstep' => 2, 'redirect' => route('login')]);
            
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return json_encode(['success' => true]);
        return redirect()->route('home')
            ->withSuccess('You have successfully registered & logged in!');

        return json_encode(['success' => false, 'message' => 'Invalid registration step']);
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        //set step 1
        session()->put('rstep', 1);
        session()->put('referral', $request->referral);

        return view('frontend.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $user = Auth::user();

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            

            if ($user && $user->is_active == 0) {
                //return 'Your account is inactive!';
                return $this->logout2();
            }
            // redirect to index page

            return redirect()->route('/')->withSuccess('You have successfully logged in!');
        } else {
            $usernameCredentials = [
                'username' => $credentials['email'],
                'password' => $credentials['password']
            ];

            if (Auth::attempt($usernameCredentials)) {

                $request->session()->regenerate();

                if ($user && $user->is_active == 0) {
                    //return 'Your account is inactive!';
                    return $this->logout2();
                }

                return redirect()->route('/')->withSuccess('You have successfully logged in!');
            }
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
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
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public function logout2()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')
            ->with('error', 'Your account is inactive!');
    }

    public function sendOtp(Request $request)
    {
        $phoneNumber = '7303418968';
        $otp = mt_rand(100000, 999999); // Generate random OTP

        $fast2sms = new Fast2SMSUtility();
        $response = $fast2sms->sendOtp($phoneNumber, $otp);

        return $response;

        // Handle the response if needed

        return response()->json(['message' => 'OTP sent successfully']);
    }
}
