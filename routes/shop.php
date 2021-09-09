<?php

use App\Http\Controllers\Shop\AuthController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\ShopUserController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');

Route::group([ 'middleware' => [ 'authShop'] ], function() {
    Route::post('/service-area', [ ShopController::class, 'updateServiceArea' ])->name('updateServiceArea');

    Route::group([ 'prefix' => 'category', 'as' => 'category.', ], function () {
        Route::get('/', [ CategoryController::class, 'index' ])->name('index');
        Route::get('/{categoryId}/product', [ CategoryController::class, 'product' ])->name('product');
        Route::post('/{categoryId}/show', [ CategoryController::class, 'makeVisible' ])->name('makeVisible');
        Route::post('/{categoryId}/hide', [ CategoryController::class, 'makeInvisible' ])->name('makeInvisible');
    });

    Route::group([ 'prefix' => 'product', 'as' => 'product.', ], function () {
        Route::post('/{productId}/show', [ ProductController::class, 'makeVisible' ])->name('makeVisible');
        Route::post('/{productId}/hide', [ ProductController::class, 'makeInvisible' ])->name('makeInvisible');
    });

    Route::group([ 'prefix' => 'order', 'as' => 'order.', ], function () {
        Route::get('/current', [ OrderController::class, 'current' ])->name('current');
        Route::group([ 'prefix' => '{orderId}' ], function () {
            Route::post('/transporter', [ OrderController::class, 'attachTransporter' ])->name('attachTransporter');
            Route::post('/status', [ OrderController::class, 'updateStatus' ])->name('updateStatus');
        });
    });

    Route::group([ 'prefix' => 'shop-user', 'as' => 'shop_user.', ], function () {
        Route::get('/transporter', [ ShopUserController::class, 'transporter' ])->name('transporter');
    });
});
