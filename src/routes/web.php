<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\{Account\Account, Home, Login\Login};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/account', Account::class)->name('account');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('oauth/google', fn () => Socialite::driver('google')->redirect());
    Route::get('oauth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::get('/', Home::class)->name('home');

