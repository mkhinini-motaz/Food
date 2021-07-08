<?php

use App\Http\Controllers\Transporter\AuthController;
use App\Http\Controllers\Transporter\OrderController;

Route::post('/login', [ AuthController::class, 'login' ])->name('login');
