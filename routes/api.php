<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::get('customers', [CustomerController::class, 'getAllcustomer']);
Route::get('customers/{id}', 'App\Http\Controllers\CustomerController@getCustomer');
Route::post('customers', 'App\Http\Controllers\CustomerController@createCustomer');
Route::put('customers/upd/{id}', 'App\Http\Controllers\CustomerController@updateCustomer');
Route::put('customers/del/{id}', 'App\Http\Controllers\CustomerController@deleteCustomer');
