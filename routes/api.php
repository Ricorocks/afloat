<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\BoatController;
use App\Http\Controllers\Api\Customer\MarinaController;

Route::get('marinas', [MarinaController::class, 'index']);
Route::get('marinas/{marina}', [MarinaController::class, 'show']);
Route::get('marinas/{marina}/events', [MarinaController::class, 'events']);

Route::prefix('customers/')->group(function() {
    Route::post('login', \App\Http\Controllers\Api\Customer\LoginController::class)
        ->name('api.customers.login');

    Route::post('register', \App\Http\Controllers\Api\Customer\RegisterController::class)
        ->name('api.customers.register');

    Route::post('forgot-password', \App\Http\Controllers\Api\Customer\PasswordResetLinkController::class)
        ->name('api.customers.password.email');


    Route::middleware('auth:sanctum')->group(function() {
        Route::get('customer', function (Request $request) {
            return $request->user();
        });

        Route::get('boats', [BoatController::class, 'index']);
    });
});

Route::prefix('marinas/')->group(function() {
    Route::post('login', \App\Http\Controllers\Api\MarinaStaff\LoginController::class)
        ->name('api.marinas.login');

    Route::post('register', \App\Http\Controllers\Api\MarinaStaff\RegisterController::class)
        ->name('api.marinas.register');

    Route::post('forgot-password', \App\Http\Controllers\Api\MarinaStaff\PasswordResetLinkController::class)
        ->name('api.marinas.password.email');

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('user', function (Request $request) {
            return $request->user();
        });
    });
});
