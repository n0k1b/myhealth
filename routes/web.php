<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/updateapp', function()
// {
//     \Artisan::call('dump-autoload');
//     echo 'dump-autoload complete';
// });

// Route::get('/password', function(){
//  echo bcrypt('$hebd@9988');
// });

// Route::get('/clear-cache', function() {
//      $exitCode = Artisan::call('cache:clear');
//      return 'Application cache cleared';
// });

Route::view('/','index');
//Route::view('login','admin_login')->name('home');
Route::view('login','login')->name('table_code');


Route::post('subscriptionReport','AdminController@subscriptionReport');
Route::post('ussd','AdminController@ussd');

Route::post('send_bdapps_otp','AdminController@send_bdapps_otp')->name('send_bdapps_otp');
Route::post('verify_bdapps_otp','AdminController@verify_bdapps_otp')->name('verify_bdapps_otp');
Route::post('verify_other_otp','AdminController@verify_other_otp')->name('verify_other_otp');

Route::get('logout','AdminController@logout')->name('logout');
Route::post('login','AdminController@login')->name('login');

// Route::post('check_table_code','AdminController@check_table_code')->name('check_table_code');


// Route::get('main_menu','AdminController@frontend_index')->name('main_menu');

// Route::get('cart_add/{id}','AdminController@cart_add')->name('cart_add');
// Route::get('get_cart_count','AdminController@get_cart_count')->name('get_cart_count');
// Route::get('get_cart_box','AdminController@get_cart_box')->name('get_cart_box');
// Route::get('get_cart_data','AdminController@get_cart_data')->name('get_cart_data');
// Route::get('cart_delete/{id}','AdminController@cart_delete')->name('cart_delete');
// Route::get('checkout','AdminController@checkout')->name('checkout');
// Route::post('order_place','AdminController@order_place')->name('order_place');
// Route::get('view_cart','AdminController@view_cart')->name('view_cart');
// Route::post('cart_update','AdminController@cart_update')->name('cart_update');
// Route::post('cart_update_dec','AdminController@cart_update_dec')->name('cart_update_dec');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
    Route::get('bill_show/{id}','AdminController@bill_show');
  Route::get('/', 'AdminController@owner_home')->name('owner_home');
  //menu start
  Route::get('show_all_menu','AdminController@show_all_menu')->name('show_all_menu');
  Route::get('add_menu_ui','AdminController@add_menu_ui')->name('add_menu_ui');
  Route::post('add_menu','AdminController@add_menu')->name('add_menu');
  Route::get('edit_menu_ui/{id}','AdminController@edit_menu_ui')->name('edit_menu_ui');
  Route::post('update_menu','AdminController@update_menu')->name('update_menu');
  Route::get('delete_menu_data/{id}','AdminController@delete_menu_data')->name('delete_menu_data');
  Route::get('menu_active_status_update/{id}','AdminController@menu_active_status_update')->name('menu_active_status_update');

   //menu end

  //category start
  Route::get('show_all_code','AdminController@show_all_code')->name('show_all_code');
//   Route::get('add_category_ui','AdminController@add_category_ui')->name('add_category_ui');
//   Route::post('add_category','AdminController@add_category')->name('add_category');
  Route::get('edit_code_ui/{id}','AdminController@edit_code_ui')->name('edit_code_ui');
//   Route::post('update_category','AdminController@update_category')->name('update_category');
//   Route::get('delete_category_data/{id}','AdminController@delete_category_data')->name('delete_category_data');
//   Route::get('category_active_status_update/{id}','AdminController@category_active_status_update')->name('category_active_status_update');


   //category end

   //Table id start
    Route::get('show_all_subscriber','AdminController@show_all_subscriber')->name('show_all_subscriber');
    Route::view('sms_send','owner.sms_send')->name('sms_send');
    Route::post('sms_send','AdminController@send_sms')->name('send_sms');

//     Route::get('add_table_id_ui','AdminController@add_table_id_ui')->name('add_table_id_ui');
//     Route::post('add_table_id','AdminController@add_table_id')->name('add_table_id');
//     Route::get('edit_table_id_ui/{id}','AdminController@edit_table_id_ui')->name('edit_table_id_ui');
    Route::post('update_code','AdminController@update_code')->name('update_code');
//     Route::get('delete_table_id_data/{id}','AdminController@delete_table_id_data')->name('delete_table_id_data');
//     Route::get('table_id_active_status_update/{id}','AdminController@table_id_active_status_update')->name('table_id_active_status_update');
//   //Table id end

//   //new order start
//   Route::get('show_all_new_order','AdminController@show_all_new_order')->name('show_all_new_order');
//   Route::get('show_all_order','AdminController@show_all_order')->name('show_all_order');

//   Route::get('menu_active_status_update/{id}','AdminController@menu_active_status_update')->name('menu_active_status_update');
//   Route::get('show_order_menu/{customer_id}','AdminController@show_order_menu')->name('show_order_menu');
//   Route::get('show_completed_order_menu/{customer_id}','AdminController@show_completed_order_menu')->name('show_completed_order_menu');

//   Route::get('confirm_payment/{customer_id}','AdminController@confirm_payment')->name('confirm_payment');
   //new order end

//   //expense start
//   Route::get('show_all_expense','AdminController@show_all_expense')->name('show_all_expense');
//   Route::get('add_expense_ui','AdminController@add_expense_ui')->name('add_expense_ui');
//   Route::post('add_expense','AdminController@add_expense')->name('add_expense');
//   Route::get('edit_expense_ui/{id}','AdminController@edit_expense_ui')->name('edit_expense_ui');
//   Route::post('update_expense','AdminController@update_expense')->name('update_expense');
//   Route::get('delete_expense_data/{id}','AdminController@delete_expense_data')->name('delete_expense_data');
//   Route::get('expense_active_status_update/{id}','AdminController@expense_active_status_update')->name('expense_active_status_update');
//   //expense end

//   //report start
//     Route::view('show_report_menu','owner.report_menu')->name('show_report_menu');
//     Route::post('show_all_report','AdminController@show_all_report')->name('show_all_report');

//   //report end

//   //salary start
//   Route::get('show_all_salary','AdminController@show_all_salary')->name('show_all_salary');
//   Route::get('add_salary_ui','AdminController@add_salary_ui')->name('add_salary_ui');
//   Route::post('add_salary','AdminController@add_salary')->name('add_salary');
//   Route::get('edit_salary_ui/{id}','AdminController@edit_salary_ui')->name('edit_salary_ui');
//   Route::post('update_salary','AdminController@update_salary')->name('update_salary');
//   Route::get('delete_salary_data/{id}','AdminController@delete_salary_data')->name('delete_salary_data');
//   Route::get('salary_active_status_update/{id}','AdminController@salary_active_status_update')->name('salary_active_status_update');
//   //salary end

});
