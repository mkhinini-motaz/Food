<?php

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/', 'ProductController@index');
});

Route::group(['prefix' => '{shopId}/category', 'as' => 'category.'], function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/{categoryId}', 'CategoryController@show');
    Route::get('/{categoryId}/product', 'CategoryController@product');
});

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/', 'ShopController@index');
    Route::get('/{shopId}', 'ShopController@show');
});

Route::group(['middleware' => ['client']], function () {
    Route::get('/profile', 'AuthController@profile');

    Route::post('/order', 'OrderController@create');
});
