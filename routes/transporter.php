<?php

use App\Http\Controllers\Transporter\AuthController;
use App\Http\Controllers\Transporter\OrderController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');

Route::group([ 'middleware' => [ 'authTransporter'] ], function() {
    Route::group([ 'prefix' => 'order', 'as' => 'order.', ], function () {
        Route::get('/current', [ OrderController::class, 'current' ])->name('current');
    });
});
