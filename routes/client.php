<?php

use \App\Http\Controllers\Client\AuthController;
use \App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\PromoCodeController;
use \App\Http\Controllers\Client\ShopController;
use \App\Http\Controllers\Client\OrderController;
use \App\Http\Controllers\Client\ClientController;


Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', [ CategoryController::class, 'index' ])->name('index');
    Route::get('/{categoryId}', [ CategoryController::class, 'show' ])->name('show');
    Route::get('/{categoryId}/product', [ CategoryController::class, 'product' ])->name('product');
});

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/', [ ShopController::class, 'index' ])->name('index');

    Route::group(['prefix' => '{shopId}', 'as' => 'product.'], function () {
        Route::post('/login', [ AuthController::class, 'login' ])->name('login');
        Route::post('/phone', [ ClientController::class, 'checkPhone' ])->name('checkPhone');
        Route::post('/register', [ AuthController::class, 'register' ])->name('register');
        Route::get('/', [ ShopController::class, 'show' ])->name('show');
        Route::get('/category', [ ShopController::class, 'category' ])->name('category');
        Route::get('/product', [ ShopController::class, 'product' ])->name('product');
    });
});

Route::get('/promo-code/{code}', [ PromoCodeController::class, 'show' ])->name('show');

Route::group(['middleware' => [ 'authClient', 'accessible_by:client' ]], function () {
    Route::get('/profile', [ AuthController::class, 'profile' ])->name('profile');
    Route::post('/profile', [ AuthController::class, 'updateProfile' ])->name('profile.update');

    Route::post('/order', [ OrderController::class, 'create' ])->name('create');
});
