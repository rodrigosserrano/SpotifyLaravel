<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\GoogleSocialiteService;
use Illuminate\Http\RedirectResponse;

class GoogleController extends Controller
{
    /**
     * @throws \Exception
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        if ((new GoogleSocialiteService())->execute()) {
            return redirect()->route('account');
        }
        return redirect()->route('login');
    }
}
