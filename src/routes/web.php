<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\{Home, Login, Account};
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

//Route::get('/', Home::class)->name('home');
Route::get('/', Account::class);
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
Route::get('oauth/google', fn () => Socialite::driver('google')->redirect());
Route::get('oauth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

