<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ServiceController;
use \App\Http\Controllers\Client\ProductController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');

Route::group([ 'middleware' => [ 'authAdmin'] ], function() {
    Route::group([ 'prefix' => 'order', 'as' => 'order.', ], function () {
        Route::get('/', [ OrderController::class, 'index' ])->name('index');
    });

    Route::group([ 'prefix' => 'service', 'as' => 'service.', ], function () {
        Route::get('/', [ ServiceController::class, 'index' ])->name('index');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/search', [ ProductController::class, 'search' ])->name('search');
    });
});
