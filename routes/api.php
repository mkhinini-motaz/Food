<?php


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

Route::post('/otp/request', [ \App\Http\Controllers\AuthController::class, 'requestOtp' ] )
    ->middleware([ 'throttle:5,3' ])
    ->name('otp.request');
