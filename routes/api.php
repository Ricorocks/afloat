<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/customers/customer', function (Request $request) {
    return $request->user();
});

Route::prefix('customers/')->group(function() {
    Route::post('login', \App\Http\Controllers\Api\Customer\LoginController::class)
        ->name('api.customers.login');

    Route::post('register', \App\Http\Controllers\Api\Customer\RegisterController::class)
        ->name('api.customers.register');

    Route::post('forgot-password', \App\Http\Controllers\Api\Customer\PasswordResetLinkController::class)
        ->name('api.customers.password.email');
});
