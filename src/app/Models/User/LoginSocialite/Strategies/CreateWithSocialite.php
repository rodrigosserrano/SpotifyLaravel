<?php

namespace App\Models\User\LoginSocialite\Strategies;

use App\Dto\User\RegisterUserDTO;
use App\Enums\ProviderSocialiteEnum;
use App\Facades\Repository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class CreateWithSocialite implements ILoginSocialite
{
    public function login(SocialiteUser $user): void
    {
        try {
            Log::info('Creating user with socialite strategy');
            $connectedAccount = Repository::connectedAccounts()->create(
                providerId: $user->getId(),
                providerName: ProviderSocialiteEnum::Google,
            );

            $newUser = Repository::users()->create(new RegisterUserDTO(
                first_name: explode(' ', $user->getName())[0] ?? null,
                last_name: explode(' ', $user->getName())[1] ?? null,
                email: $user->getEmail(),
                picture_link: $user->getAvatar(),
                connectedAccount: $connectedAccount,
                )
            );
            Log::info('User created with socialite strategy');
            Auth::login($newUser);
        } catch (Exception $e) {
            Log::error('Error creating user with socialite strategy: ' . $e->getMessage());
            throw $e;
        }
    }
}
