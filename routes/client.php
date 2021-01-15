<?php

Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register')->name('register');

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/{categoryId}', 'CategoryController@show')->name('show');
    Route::get('/{categoryId}/product', 'CategoryController@product')->name('product');
});

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/', 'ShopController@index')->name('index');

    Route::group(['prefix' => '{shopId}', 'as' => 'product.'], function () {
        Route::get('/', 'ShopController@show')->name('show');
        Route::get('/category', 'ShopController@category')->name('category');
        Route::get('/product', 'ShopController@product')->name('product');
    });
});

Route::group(['middleware' => [ 'authClient', 'accessible_by:client' ]], function () {
    Route::get('/profile', 'AuthController@profile')->name('profile');
    Route::post('/profile', 'AuthController@updateProfile')->name('profile.update');

    Route::post('/order', 'OrderController@create')->name('create');
});
