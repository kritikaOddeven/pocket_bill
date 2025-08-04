<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api','namespace' => 'API'], function(){
    Route::post('details', 'UserController@details');
    Route::resource('categories', 'CategoriesController');
    Route::resource('subcategories', 'SubcategoriesController');
    Route::get('subcategorylist/{catId}', 'SubcategoriesController@subcategorylist');
    Route::resource('customers', 'CustomersController');
    Route::resource('bills', 'BillsController');
    Route::get('dashboard', 'BillsController@dashboard');
    // Route::get('billPdf/{catId}', 'BillsController@billPdf');

    Route::resource('wo_gst/customers', 'WoGSTCustomersController');
    Route::resource('wo_gst/bills', 'WoGSTBillsController');
});
// Route::get('billPdf/{catId}', 'API\BillsController@billPdf');
Route::get('billPdf/{catId}/{billname}', 'API\BillsController@billPdf');
Route::get('wo_gst/billPdf/{catId}/{billname}', 'API\WoGSTBillsController@billPdf');
