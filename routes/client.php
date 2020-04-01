<?php

Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register')->name('register');

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/', 'ProductController@index')->name('index');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/{categoryId}', 'CategoryController@show')->name('show');
    Route::get('/{categoryId}/product', 'CategoryController@product')->name('product');
});

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/', 'ShopController@index')->name('index');
    Route::get('/{shopId}', 'ShopController@show')->name('show');
});

Route::group(['middleware' => [ 'auth:sanctum', 'accessible_by:client' ]], function () {
    Route::get('/profile', 'AuthController@profile')->name('profile');
    Route::post('/profile', 'AuthController@updateProfile')->name('profile.update');

    // TODO: phone number confirmation routes

    Route::post('/order', 'OrderController@create')->name('create');
});
