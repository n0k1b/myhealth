<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('send_bdapps_otp','AdminController@send_bdapps_otp');
Route::post('verify_bdapps_otp','AdminController@verify_bdapps_otp');
Route::get('update_subscription_status','AdminController@update_subscription_status');
Route::post('test','AdminController@test');

Route::post('subscriptionReport','AdminController@subscriptionReport');
Route::post('ussd','AdminController@ussd');
