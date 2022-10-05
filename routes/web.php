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


Route::get('logout',function()
{
    // define logout here
})->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'admin.home')->name('admin');
    Route::view('/add-user', 'admin.add_user');
    Route::get('order-generate',"AdminController@order_generate")->name('order-generate');
    Route::get('user-creation', 'AdminController@show_all_user')->name('show_all_user');
    Route::get('new-order', 'AdminController@show_new_order');
    Route::get('report', 'AdminController@view_report_menue');
    Route::get('bp-tracker', 'AdminController@view_bp_track_report_menue');
    Route::post('show_report','AdminController@show_report')->name('show_report');
    Route::post('show_bp_report','AdminController@show_bp_report')->name('show_bp_report');
    Route::post('confirm_order','AdminController@confirm_order');
    Route::get('edit_report/{id}','AdminController@edit_report');
    Route::get('bp-remarks/{id}','AdminController@bp_remarks');
    
    Route::post('submit_report_edit','AdminController@submit_report_edit')->name('submit_report_edit');
    Route::post('bp-remakrs-submit','AdminController@bp_remarks_submit')->name('bp-remakrs-submit');
    Route::get('edit_user/{id}','AdminController@edit_user');
    Route::get('update_password/{id}','AdminController@update_password');
    Route::post('add_user',"AdminController@add_user")->name('add_user');
    Route::post('update_user',"AdminController@update_user")->name('update_user');
    Route::post('update_user_password',"AdminController@update_user_password")->name('update_user_password');
    Route::get('export_order_report','AdminController@export_data')->name('export_order_report');
    Route::post('submit_order','AdminController@submit_order')->name('submit_order_admin');
});

Route::group(['prefix' => 'order-generator'], function () {
    Route::post('submit_order','OrderGeneratorController@submit_order')->name('submit_order_order_generator');
    Route::view('/', 'order_generator.home');
    Route::get('order-generate', 'OrderGeneratorController@order_generate');
    Route::view('/pending-order', 'salesman.pending_order');
    Route::get('report', 'OrderGeneratorController@view_report_menue');
    Route::post('show_report_order_generator','OrderGeneratorController@show_report_order_generator')->name('show_report_order_generator');

    // Route::view('/user-creation', 'admin.user_creation');
    // Route::view('/new-order', 'admin.new_order');
    // Route::view('/report', 'admin.report');
    // Route::view('/order-generator', 'admin.order_generator');
});

Route::group(['prefix' => 'bp'], function () {
    Route::post('submit_order','BpController@submit_order')->name('submit_record_brand_promoter');
    Route::view('/', 'bp.home');
    Route::get('order-generate', 'BpController@order_generate')->name('order-generate-bp');
    Route::view('/pending-order', 'salesman.pending_order');
    Route::view('report', 'bp.report_menue');
    Route::post('show_report_bp','BpController@show_report')->name('show_report_bp');
    Route::get('edit_report/{id}','BpController@edit_report');
    
    Route::post('submit_edit_report_bp','BpController@submit_edit_report')->name('submit_edit_report_bp');
    // Route::view('/user-creation', 'admin.user_creation');
    // Route::view('/new-order', 'admin.new_order');
    // Route::view('/report', 'admin.report');
    // Route::view('/order-generator', 'admin.order_generator');
});

Route::group(['prefix' => 'retailer'], function () {
    Route::post('submit_order','RetailerController@submit_order')->name('submit_record_retailer');
    Route::view('/', 'retailer.home');
    Route::get('order-generate', 'RetailerController@order_generate')->name('order-generate-retailer');
    Route::view('/pending-order', 'salesman.pending_order');
    Route::view('report', 'retailer.report_menue');
    Route::post('show_report_bp','RetailerController@show_report')->name('show_report_retailer');
    Route::get('edit_report/{id}','RetailerController@edit_report');
    
    Route::post('submit_edit_report_bp','RetailerController@submit_edit_report')->name('submit_edit_report_retailer');
    // Route::view('/user-creation', 'admin.user_creation');
    // Route::view('/new-order', 'admin.new_order');
    // Route::view('/report', 'admin.report');
    // Route::view('/order-generator', 'admin.order_generator');
});