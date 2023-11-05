<?php

namespace App\Models\User\LoginSocialite;

use Laravel\Socialite\Contracts\User as SocialiteUser;

interface IUser
{
    public function login(SocialiteUser $user): void;
}
