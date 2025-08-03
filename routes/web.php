<?php
date_default_timezone_set("Asia/Kolkata");

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Controllers
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CustomForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\Payment\CcavenueController;

use App\Http\Controllers\Payment\PayPalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group.
*/

/*------------------------------------------------------
| Admin Routes
-------------------------------------------------------*/

Route::prefix('admin')->group(base_path('routes/admin.php'));



/*------------------------------------------------------
| Utility / Artisan Commands Routes
-------------------------------------------------------*/
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache cleared successfully.";
});

Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    return "Storage link created successfully.";
});



/*------------------------------------------------------
| Home Page
-------------------------------------------------------*/
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('/');



/*------------------------------------------------------
| Authenticated Bidding Routes
-------------------------------------------------------*/
Route::group(['middleware' => ['auth']], function () {
    // Bidding
    Route::post('/auto-bid-req', [BiddingController::class, 'auto_bid_req'])->name('auto_bid_req');
    Route::post('/bid-now', [BiddingController::class, 'bid_now'])->name('bid_now');

    // Top-up Bid Credits
    Route::get('/top-up-bid-credits', [BiddingController::class, 'topup_bid_credits'])->name('topup_bid_credits');
    Route::get('/top-up-bid-credits/{id}', [BiddingController::class, 'topup_bid_credits_detail'])->name('topup_bid_credits_detail');
    Route::get('/payment/{method}/{id}', [BiddingController::class, 'buy_topup_credits'])->name('buy_topup_credits');
    Route::any('/apply-coupon', [BiddingController::class, 'applyCoupon'])->name('applyCoupon');

    // Buy Now
    Route::get('product/buy/{id}', [HomeController::class, 'buy_product_detail_page'])->name('buy_product_detail_page');
    Route::get('product/payment/{method}/{id}', [HomeController::class, 'buy_now_product'])->name('buy_now_product');

    // User Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'customer_profile_dashboard'])->name('profile.customer_profile_dashboard');
        Route::get('/manage', [HomeController::class, 'customer_profile_edit'])->name('profile.customer_profile_edit');
        Route::post('/update_profile_post', [HomeController::class, 'update_profile'])->name('profile.update_profile');
        Route::post('/update_basic_profile_detail_post', [HomeController::class, 'update_basic_profile_detail'])->name('profile.update_basic_profile_detail');
        Route::post('/update_password_post', [HomeController::class, 'update_password'])->name('profile.update_password');
    });
});



/*------------------------------------------------------
| CCAvenue Payment Routes
-------------------------------------------------------*/
Route::controller(CcavenueController::class)->group(function () {
    Route::get('/ccavenue', 'showForm');
    Route::any('/ccavenue/response/{id}', 'paymentResponse')->name('ccavenue.response');
    Route::any('/ccavenue/cancel/{id}', 'paymentCancel')->name('ccavenue.cancel');
    Route::any('/ccavenue/webhook1', 'paymentWebhook1')->name('ccavenue.webhook1');
    Route::any('/ccavenue/webhook2', 'paymentWebhook2')->name('ccavenue.webhook2');
    Route::any('/ccavenue/paymentFailure/{orderStatus}/{orderId}', 'paymentFailure')->name('ccavenue.paymentFailure');
});



// Route::get('/paypal/payment/success', function () {
//     return 'This is the test success page.';
// });

// ✅ PUT THESE FIRST
Route::get('/paypal', [PayPalController::class, 'index'])->name('paypal');
Route::any('/paypal/payment/{id}', [PayPalController::class, 'payment'])->name('paypal.payment');
Route::any('/paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::any('/paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment.cancel');

/*------------------------------------------------------
| Public Pages
-------------------------------------------------------*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/about-us', 'about_us')->name('about_us');
    Route::get('/terms-and-condition', 'terms_and_condition')->name('terms_and_condition');
    Route::get('/privacy-policy', 'privacy_policy')->name('privacy_policy');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/tips-and-trick', 'tips_and_tricks')->name('tips_and_tricks');
    Route::get('/contact-us', 'contact_us')->name('contact_us');
});




/*------------------------------------------------------
| Auth Pages (Login/Register/Logout)
-------------------------------------------------------*/
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/send-otp', 'sendOtp')->name('sendOtp');
});



/*------------------------------------------------------
| Forgot & Reset Password
-------------------------------------------------------*/
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', [CustomForgotPasswordController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('frontend.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', [CustomForgotPasswordController::class, 'resetPassword'])->name('password.update');
});


/*------------------------------------------------------
| Static Profile Pages
-------------------------------------------------------*/
Route::view('/profile/my-account', 'frontend.userprofile.my-account');
Route::view('/profile/order-history', 'frontend.userprofile.order-history');
Route::view('/profile/referral-view', 'frontend.userprofile.referral-view');
Route::view('/profile/manage-autobid', 'frontend.userprofile.manage-autobid');


/*------------------------------------------------------
| Miscellaneous Routes
-------------------------------------------------------*/
Route::get('/latest-bidder', [BiddingController::class, 'latest_bidder'])->name('latest-bidder');
Route::get('winner', function () {
    return view('frontend.winner');
});
Route::get('auction/{id}', [AuctionController::class, 'index'])->name('auction.index');
Route::get('/test', function () {
    return view('welcome1');
});
Route::get('/cron_auto_bid', [BiddingController::class, 'cron_auto_bid_web'])->name('cron_auto_bid_web');
