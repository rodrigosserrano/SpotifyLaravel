<?php

namespace App\Models\User;

use Laravel\Socialite\Contracts\User as SocialiteUser;

interface IUserStrategy
{
    public function execute(SocialiteUser $user);
}
