<?php
namespace App\Http\Controllers\Auth;
use App\Entities\ConnectedAccount;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleSocialite extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback(): Application|RedirectResponse|Response|Redirector
    {
        // TODO: Refact. This was made only for testing purposes.
        try {
            $userGoogle = Socialite::driver('google')->user();

            $user = User::whereRelation('connectedAccounts', 'google_id', $userGoogle->getId())->first();
            if ($user) {
                Auth::login($user);
                return redirect('/');
            } else {
                $connectedAccount = ConnectedAccount::create([
                    'uuid' => Str::uuid()->toString(),
                    'google_id' => $userGoogle->getId(),
                ]);

                $newUser = User::create([
                    'uuid' => Str::uuid()->toString(),
                    'name' => $userGoogle->getName(),
                    'email' => $userGoogle->getEmail(),
                    'picture_link' => $userGoogle->getAvatar(),
                    'email_verified' => $userGoogle->user['email_verified'],
                    'email_verified_at' => now(),
                    'password' => Hash::make(''),
                    'has_password' => false,
                    'connected_account_id' => $connectedAccount->id,
                ]);

                $newUser->save();

                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
