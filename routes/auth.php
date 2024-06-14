<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'controller' => AuthController::class], function () {
    Route::get('login','index')->name('login');
    Route::post('login',  'store')->name('login.store');
    Route::get('logout', 'destroy')->name('login.destroy');
    Route::get('/', 'redirect')->name('/');
});

Route::group(['prefix' => '/'], function () {
    Route::get('forget', [PasswordResetController::class, 'show'])->name('password.forget');
    Route::post('forget', [PasswordResetController::class, 'store'])->name('password.store');
    Route::get('reset/{token}', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset', [PasswordResetController::class, 'resetStore'])->name('password.reset.store');
});