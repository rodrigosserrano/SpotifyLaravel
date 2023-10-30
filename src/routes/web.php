<?php

use App\Http\Controllers\Auth\GoogleSocialite;
use App\Livewire\{Home, Login, Playlist};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::get('oauth/google', [GoogleSocialite::class, 'redirectToGoogle']);
Route::get('oauth/google/callback', [GoogleSocialite::class, 'handleGoogleCallback']);

