<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('forgot-password','AuthController@forgot_password');
Route::post('set-password', 'AuthController@SetChangePass');

Route::post('register', 'LoginController@register');
Route::post('login', 'LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
});
Route::post('order', 'OrderController@OrderDetails')->name('order_details');
Route::post('orderdone', 'OrderController@OrderDone')->name('order_placed');
Route::get('orderview', 'OrderController@orderview')->name('order_view');
Route::post('payment', 'OrderController@payProcess')->name('pay_Process');
Route::post('change-password', 'AuthController@change_password');
