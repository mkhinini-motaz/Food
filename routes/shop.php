<?php

use App\Http\Controllers\Shop\AuthController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\OrderController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');

Route::group([ 'middleware' => [ 'authShop'] ], function() {
    Route::group([ 'prefix' => 'category', 'as' => 'category.', ], function () {
        Route::get('/', [ CategoryController::class, 'index' ])->name('index');
        Route::get('/{categoryId}', [ CategoryController::class, 'show' ])->name('show');
        Route::get('/{categoryId}/product', [ CategoryController::class, 'product' ])->name('product');
    });


    Route::group([ 'prefix' => 'order', 'as' => 'order.', ], function () {
        Route::get('/current', [ OrderController::class, 'current' ])->name('index');
    });
});
