<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DiscountCouponController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RoleController;
use BaconQrCode\Encoder\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('foregtpassword', function () {
    return view('admin.forms.forget_email');
})->name('foregtpassword');

Route::get('resetpassword', function () {
return view('auth.passwords.reset');
})->name('resetpassword');

// Admin Login
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin_login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('admin_logout');
    Route::get('login/google', [LoginController::class, 'redirectToProvider'])->name('google');
    Route::get('login/google/callback', [LoginController::class, 'handleProviderCallback']);
});

// after login view
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', function () {
        return view('Admin.forms.dashboard');
    })->name('dashborad');

    // subadminlogin 
    Route::resource('subadmin', 'SubAdminController');

    //  USer Module
    Route::resource('/user', 'UsersController');
    Route::get('list', [UsersController::class, 'index'])->name('userlist');
    Route::get('/view-user/{id}', [UsersController::class, 'show'])->name('userview');
    Route::get('/edit-user/{id}', [UsersController::class, 'edit'])->name('user_edit');
    Route::post('/update-user', [UsersController::class, 'update'])->name('user_update');
    Route::get('/delete-user', [UsersController::class, 'destroy'])->name('user_delete');
    Route::get('user-status', [UsersController::class, 'userstatus'])->name('user_status1');
    // Route::get('assing-role', [UsersController::class, 'assignRole'])->name('assing_role');

    // Profile Module
    Route::resource('/profile', 'ProfileController');
    Route::post('/profile-update', [ProfileController::class, 'update'])->name('profile_update');
    Route::get('change-view', [ProfileController::class, 'changePasswordview'])->name('view');
    Route::post('change-pass', [ProfileController::class, 'changePassword'])->name('change_pass');


    // Resturant Module
    Route::resource('/restaurant', 'RestaurantController');
    Route::get('/delete-rest', [RestaurantController::class, 'destroy'])->name('delete');
    Route::get('/view-rest/{id}', [RestaurantController::class, 'Show'])->name('view_rest');
    Route::get('/edit-rest/{id}', [RestaurantController::class, 'edit'])->name('edit_rest');
    Route::post('/update-rest', [RestaurantController::class, 'update'])->name('update_rest');
    Route::get('rest-status', [RestaurantController::class, 'statusChange'])->name('rest_status');


    // Meal Moduale
    Route::resource('/meal', 'MealController');
    Route::get('/delete-meal', [MealController::class, 'destroy'])->name('delete_meal');
    Route::get('/view-meal/{id}', [MealController::class, 'show'])->name('view_meal');
    Route::get('/edit-meal/{id}', [MealController::class, 'edit'])->name('edit_meal');
    Route::post('/update-meal', [MealController::class, 'update'])->name('update_meal');
    Route::get('meal-quantity', [MealController::class, 'quantitycount'])->name('meal_quantity');


    // Order Module
    Route::get('order-view', [OrderController::class, 'View'])->name('order_view');
    Route::get('order-show/{id}', [OrderController::class, 'show'])->name('order_show');
    Route::get('delete-order/{id}', [OrderController::class, 'delete'])->name('delete_order');
    Route::get('order-status', [OrderController::class, 'statusChange'])->name('order_status');


    // Discount Module
    Route::resource('copun', 'DiscountCouponController');
    Route::get('view-discount/{id}', [DiscountCouponController::class, 'show'])->name('view_discount');
    Route::get('edit-discount/{id}', [DiscountCouponController::class, 'edit'])->name('edit_discount');
    Route::post('update-discount', [DiscountCouponController::class, 'update'])->name('update_discount');
    Route::get('delete-discount/{id}', [DiscountCouponController::class, 'destroy'])->name('delete_discount');
    Route::get('discount-status', [DiscountCouponController::class, 'discountstatus'])->name('discount_status');

    // Payment Module
    Route::resource('payment', 'PaymentController');
    Route::get('payment-status', [PaymentController::class, 'paymentstatus'])->name('payment_status');

    // Qr Code
    Route::get('qrcode', function () {
        return view('Admin.forms.qrcode');
    })->name('qr_code');


    // Export And Import data 
    Route::get('/file-import', [MealController::class, 'importView'])->name('import-view');
    Route::post('/import', [MealController::class, 'import'])->name('import');
    Route::get('/export-meal', [MealController::class, 'exportmeal'])->name('export-meal');

    // Role Create 
    Route::resource('role', 'RoleController');
    // Route::get('register-view', [RoleController::class, 'registerview'])->name('register_view');
    // Route::post('register-subadmin', [RoleController::class, 'registersubadmin'])->name('register_subadmin');


    // Permission Add 
    Route::resource('permission', 'PermissionController');
});
