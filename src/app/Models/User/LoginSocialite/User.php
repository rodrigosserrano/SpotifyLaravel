<?php

namespace App\Models\User\LoginSocialite;

use Laravel\Socialite\Contracts\User as SocialiteUser;

final class User
{
    private IUser $strategy;

    public function setStrategy(IUser $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function login(SocialiteUser $user): void
    {
        $this->strategy->login($user);
    }
}
