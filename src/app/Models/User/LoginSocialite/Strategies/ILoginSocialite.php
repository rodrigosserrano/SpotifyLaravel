<?php

namespace App\Models\User\LoginSocialite\Strategies;

use Laravel\Socialite\Contracts\User as SocialiteUser;

interface ILoginSocialite
{
    public function login(SocialiteUser $user): void;
}
