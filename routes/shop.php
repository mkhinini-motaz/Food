<?php

use App\Http\Controllers\Shop\AuthController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');
