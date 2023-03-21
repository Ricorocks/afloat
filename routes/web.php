<?php

use App\Http\Controllers\BerthController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\GateEventController;
use App\Http\Controllers\MarinaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function() {
    Route::controller(UserController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
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
    Route::controller(BerthController::class)->group(function() {
        Route::get('{marina}/berths/', 'overview')->name('marina.berths.overview');
        Route::get('{marina}/berths/manage', 'manage')->name('marina.berths.manage');
    });
});
