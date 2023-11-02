<?php

namespace App\Models\User\LoginSocialite;

use App\Entities\ConnectedAccount;
use App\Entities\User;
use App\Enums\ProviderSocialiteEnum;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class CreateWithSocialite implements IUser
{
    public function login(SocialiteUser $user): void
    {
        try {
            $connectedAccount = ConnectedAccount::create([
                'provider_id' => $user->getId(),
                'provider' => ProviderSocialiteEnum::Google->value,
            ]);

            $firstName = explode(' ', $user->getName())[0] ?? null;
            $lastName = explode(' ', $user->getName())[1] ?? null;

            $newUser = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $user->getEmail(),
                'picture_link' => $user->getAvatar(),
                'password' => Hash::make(''),
                'has_password' => false,
                'connected_account_id' => $connectedAccount->id,
            ]);

            $newUser->save();

            Auth::login($newUser);
        } catch (Exception $e) {
            Log::error('Error creating user with socialite strategy: ' . $e->getMessage());
            throw $e;
        }
    }
}
