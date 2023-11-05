<?php

namespace App\Models\User\LoginSocialite;

use App\Entities\ConnectedAccount;
use App\Entities\User;
use App\Enums\ProviderSocialiteEnum;
use App\Facades\Repository;
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
            Log::info('Creating user with socialite strategy');
            $connectedAccount = Repository::connectedAccounts()->create(
                providerId: $user->getId(),
                providerName: ProviderSocialiteEnum::Google,
            );

            $newUser = Repository::users()->create(
                firstName: explode(' ', $user->getName())[0] ?? null,
                lastName: explode(' ', $user->getName())[1] ?? null,
                email: $user->getEmail(),
                connectedAccount: $connectedAccount,
                pictureLink: $user->getAvatar(),
            );
            Log::info('User created with socialite strategy');
            Auth::login($newUser);
        } catch (Exception $e) {
            Log::error('Error creating user with socialite strategy: ' . $e->getMessage());
            throw $e;
        }
    }
}
