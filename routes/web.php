<?php

use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\PasswordResetController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\BookmarkController;
use App\Http\Controllers\Web\ConversionController;
use App\Http\Controllers\Web\CurrencyController;
use App\Http\Controllers\Web\HistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConversionController::class, 'conversion'])->name('welcome');
Route::get('/rate', [CurrencyController::class, 'rate'])->name('rate');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::get('/history', [HistoryController::class, 'historyRate'])->name('history');
Route::post('/convert', [ConversionController::class, 'convert'])->name('convert');

Route::get('/test', [CurrencyController::class, 'master'])->name('test');

//Password Reset
Route::middleware('guest')->group(function () {
    Route::get('/forgot', [PasswordResetController::class, 'requestForm'])->name('password.request');
    Route::post('/forgot', [PasswordResetController::class, 'mail'])->name('password.email');
    Route::get('/reset/{token}', [PasswordResetController::class, 'resetForm'])->name('password.reset');
    Route::post('/reset', [PasswordResetController::class, 'reset'])->name('password.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('login.destroy');
    Route::get('/favourites', [BookmarkController::class, 'favourite'])->name('favourite');
    Route::post('/save', [BookmarkController::class, 'save'])->name('save');
});
