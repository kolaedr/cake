<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Http\Controllers\API;

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

Route::apiResource('cake-filling', 'API\CakeFillingAPIController');


// Route::get('/free-day', 'Admin\BookingController@getFreeDay');
Route::get('/booking-calendar', 'Admin\BookingController@getBookingList');
// Route::get('/get-count', 'Admin\CartController@getCount');
