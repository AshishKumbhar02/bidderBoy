<?php
date_default_timezone_set("Asia/Kolkata");

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontendSettingsController;
use App\Http\Controllers\Admin\BusinessSettingsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BidsPackController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\BiddingController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*------------------------------------------------------
| Admin Guest Routes (Login, Forgot Password)
-------------------------------------------------------*/

Route::middleware(['admin.guest'])->group(function () {
    Route::get('/', fn() => redirect(route('admin.login')));

    // Login Routes
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/postLogin', [AuthController::class, 'postLogin']);

    // Forgot Password
    Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('admin.forgot_password');
    Route::post('/post_forgot_password', [AuthController::class, 'post_forgot_password']);
});


/*------------------------------------------------------
| Admin Logout Route
-------------------------------------------------------*/
Route::get('/logout', [AuthController::class, 'Logout'])->middleware('admin.auth');



/*------------------------------------------------------
| Admin Dashboard
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/dashboard', fn() => view('backend.dashboard'))->name('admin.dashboard');
});



/*------------------------------------------------------
| Frontend Settings
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('frontend_settings')->group(function () {
    Route::get('/', fn() => view('backend.frontend_settings.index'));

    Route::post('/update_contact_detail', [FrontendSettingsController::class, 'update_contact_detail'])->name('frontend_settings.update_contact_detail');
    Route::post('/update_about_us', [FrontendSettingsController::class, 'update_about_us'])->name('frontend_settings.update_about_us');
    Route::post('/update_terms_and_condition', [FrontendSettingsController::class, 'update_terms_and_condition'])->name('frontend_settings.update_terms_and_condition');
    Route::post('/update_privacy_policy', [FrontendSettingsController::class, 'update_privacy_policy'])->name('frontend_settings.update_privacy_policy');
    Route::post('/update_faqs', [FrontendSettingsController::class, 'update_faqs'])->name('frontend_settings.update_faqs');
    Route::post('/update_tips_and_trick', [FrontendSettingsController::class, 'update_tips_and_trick'])->name('frontend_settings.update_tips_and_trick');
});



/*------------------------------------------------------
| Business Settings
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('business_settings')->group(function () {
    Route::get('/', [BusinessSettingsController::class, 'index'])->name('business_settings.index');
    Route::post('/update_fast2sms_settings', [BusinessSettingsController::class, 'update_fast2sms_settings'])->name('business_settings.update_fast2sms_settings');
    Route::post('/update_kyc_verification_settings', [BusinessSettingsController::class, 'update_kyc_verification_settings'])->name('business_settings.update_kyc_verification_settings');
});



/*------------------------------------------------------
| Bidding Logs & Auto-Bid Customers
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->group(function () {
    Route::get('auto_bid_customers', [BiddingController::class, 'bil_list'])->name('bil_list');
    Route::get('bid_log', [BiddingController::class, 'bid_log'])->name('bid_log');
});


/*------------------------------------------------------
| Customer Management
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('customers')->group(function () {
    Route::get('/', [CustomersController::class, 'index'])->name('customers.index');

    Route::get('/credits_list', [CustomersController::class, 'credits_list'])->name('customers.credits_list');
    Route::get('/edit_customer/{id}', [CustomersController::class, 'edit_customer'])->name('customers.edit_customer');
    Route::get('/delete/{id}', [CustomersController::class, 'delete_customer'])->name('customers.delete');
    Route::get('/create', [CustomersController::class, 'create'])->name('customers.create');

    Route::post('/createPost', [CustomersController::class, 'createPost'])->name('customers.createPost');
    Route::post('/update_customer_profile/{id}', [CustomersController::class, 'update_customer_profile'])->name('customers.update_customer_profile');

    Route::any('/update_kyc_ducument_status/{id}/{status}', [CustomersController::class, 'update_kyc_ducument_status'])->name('customers.update_kyc_ducument_status');
    Route::any('/update_credit_request/{id}/{status}/{credit}/{user_id}', [CustomersController::class, 'update_credit_request'])->name('customers.update_credit_request');
    Route::any('/update_customer_status/{id}/{status}', [CustomersController::class, 'update_customer_status'])->name('customers.update_customer_status');
});



/*------------------------------------------------------
| Product Management
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('product')->group(function () {
    Route::get('add', [ProductController::class, 'add'])->name('product.add');
    Route::post('create', [ProductController::class, 'create'])->name('product.create');

    Route::get('all', [ProductController::class, 'index'])->name('product.index');
    Route::get('edit/{productId}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('update/{productId}', [ProductController::class, 'update'])->name('product.update');

    Route::get('clone/{productId}', [ProductController::class, 'clone'])->name('product.clone');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
});




/*------------------------------------------------------
| Export Utilities
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('export')->group(function () {
    Route::get('allCustomers', [ExportController::class, 'allCustomers'])->name('export.allCustomers');
});



/*------------------------------------------------------
| Bids Pack Management
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('bids_packs')->group(function () {
    Route::get('/', [BidsPackController::class, 'index'])->name('bids_packs.index');
    Route::get('edit/{id}', [BidsPackController::class, 'edit'])->name('bids_packs.edit');
    Route::get('delete/{id}', [BidsPackController::class, 'delete'])->name('bids_packs.delete');

    Route::post('create', [BidsPackController::class, 'create'])->name('bids_packs.create');
    Route::post('update/{id}', [BidsPackController::class, 'update'])->name('bids_packs.update');
});


/*------------------------------------------------------
| Coupon Management
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('coupon')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::get('delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');

    Route::post('create', [CouponController::class, 'create'])->name('coupon.create');
    Route::post('update/{id}', [CouponController::class, 'update'])->name('coupon.update');
});


/*------------------------------------------------------
| Promo Management
-------------------------------------------------------*/
Route::middleware(['admin.auth'])->prefix('promo')->group(function () {
    Route::get('/', [PromoController::class, 'index'])->name('promo.index');
});
