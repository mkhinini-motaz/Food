<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OrderController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');

Route::group([ 'middleware' => [ 'authAdmin'] ], function() {
    Route::group([ 'prefix' => 'order', 'as' => 'order.', ], function () {
        Route::get('/', [ OrderController::class, 'index' ])->name('index');
    });
});
