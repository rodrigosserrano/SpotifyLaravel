<?php

namespace App\Models\User\LoginSocialite\Strategies;

use App\Facades\Repository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class GetWithSocialite implements ILoginSocialite
{
    public function login(SocialiteUser $user): void
    {
        $user = Repository::users()->getByProviderAccountId($user->getId());
        if (!$user) {
            throw new \Exception('User not found');
        }
        Auth::login($user);
    }
}
