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

Route::view('/', 'app');
Route::post('submit_order','AdminController@submit_order')->name('submit_order');

Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'admin.home');
    Route::view('/add-user', 'admin.add_user');
    Route::get('order-generate',"AdminController@order_generate")->name('order-generate');
    Route::get('user-creation', 'AdminController@show_all_user')->name('show_all_user');
    Route::view('/new-order', 'admin.new_order');
    Route::get('report', 'AdminController@view_report_menue');
    Route::post('show_report','AdminController@show_report')->name('show_report');
    
    Route::get('edit_user/{id}','AdminController@edit_user');
    Route::get('update_password/{id}','AdminController@update_password');
    Route::post('add_user',"AdminController@add_user")->name('add_user');
    Route::post('update_user',"AdminController@update_user")->name('update_user');
    Route::post('update_user_password',"AdminController@update_user_password")->name('update_user_password');
});

Route::group(['prefix' => 'salesman'], function () {
    Route::view('/', 'salesman.home');
    Route::view('/new-order', 'salesman.new_order');
    Route::view('/pending-order', 'salesman.pending_order');
    // Route::view('/user-creation', 'admin.user_creation');
    // Route::view('/new-order', 'admin.new_order');
    // Route::view('/report', 'admin.report');
    // Route::view('/order-generator', 'admin.order_generator');
});
