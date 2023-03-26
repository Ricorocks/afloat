<?php

use App\Http\Controllers\GateController;
use App\Http\Controllers\GateEventController;
use App\Http\Controllers\MarinaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::controller(UserController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});

Route::prefix('marina')->group(function() {
    Route::controller(MarinaController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('marina.dashboard');
    });
    Route::controller(GateController::class)->group(function() {
        Route::get('{marina}/gates/', 'index')->name('marina.gates.index');
        Route::get('{marina}/gates/{gate}', 'show')->name('marina.gates.show');
    });
    Route::controller(GateEventController::class)->group(function() {
        Route::get('{marina}/gates/{gate}/events', 'show')->name('marina.gates.events.show');
    });
});
