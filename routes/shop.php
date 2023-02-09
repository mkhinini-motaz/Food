<?php

use App\Http\Controllers\Shop\AuthController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\ShopUserController;
use App\Http\Controllers\Shop\PromoCodeController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');
Route::get('/promo-code/{code}', [ PromoCodeController::class, 'show' ])->name('promo-code.show');

Route::group([ 'middleware' => [ 'authShop'] ], function() {
    Route::post('/device-id', [ AuthController::class, 'deviceId' ])->name('deviceId');
    Route::get('/profile', [ AuthController::class, 'profile' ])->name('profile');
    Route::post('/service-area', [ ShopController::class, 'updateServiceArea' ])->name('updateServiceArea');

    Route::group([ 'prefix' => 'category', 'as' => 'category.', ], function () {
        Route::get('/', [ CategoryController::class, 'index' ])->name('index');

        Route::group([ 'prefix' => '{categoryId}' ], function () {
            Route::get('/', [ CategoryController::class, 'show' ])->name('show');
            Route::post('/', [ CategoryController::class, 'update' ])->name('update');
            Route::get('/product', [ CategoryController::class, 'product' ])->name('product');
            Route::post('/show', [ CategoryController::class, 'makeVisible' ])->name('makeVisible');
            Route::post('/hide', [ CategoryController::class, 'makeInvisible' ])->name('makeInvisible');

        });
    });

    Route::group([ 'prefix' => 'product', 'as' => 'product.', ], function () {
        Route::get('/', [ ProductController::class, 'index' ])->name('index');
        Route::post('/{productId}/show', [ ProductController::class, 'makeVisible' ])->name('makeVisible');
        Route::post('/{productId}/hide', [ ProductController::class, 'makeInvisible' ])->name('makeInvisible');
    });

    Route::group([ 'prefix' => 'order', 'as' => 'order.', ], function () {
        Route::get('/current', [ OrderController::class, 'current' ])->name('current');
        Route::get('/report', [ OrderController::class, 'report' ])->name('report');
        Route::get('/{orderId}', [ OrderController::class, 'show' ])->name('show');
        Route::post('/{orderId}', [ OrderController::class, 'update' ])->name('update');
        Route::post('/', [ OrderController::class, 'create' ])->name('create');

        Route::group([ 'prefix' => '{orderId}' ], function () {
            Route::post('/transporter', [ OrderController::class, 'attachTransporter' ])->name('attachTransporter');
            Route::post('/status', [ OrderController::class, 'updateStatus' ])->name('updateStatus');
            Route::post('/is-payed', [ OrderController::class, 'updateIsPayed' ])->name('updateIsPayed');
        });
    });

    Route::group([ 'prefix' => 'shop-user', 'as' => 'shop_user.', ], function () {
        Route::get('/transporter', [ ShopUserController::class, 'transporter' ])->name('transporter');
        Route::get('/order/current', [ ShopUserController::class, 'currentOrders' ])->name('currentOrders');
    });

    Route::group([ 'prefix' => 'menu', 'as' => 'menu.', ], function () {
        Route::post('/lang', [ ShopController::class, 'updateMenuLang' ])->name('lang.update');
    });
});
