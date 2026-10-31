<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::view('/', 'welcome')->name('home');
Route::group([], function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    });

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

require __DIR__.'/settings.php';
