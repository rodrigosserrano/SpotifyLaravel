<?php

namespace App\Models\User\LoginSocialite;

use App\Models\User\LoginSocialite\Strategies\ILoginSocialite;
use Laravel\Socialite\Contracts\User as SocialiteUser;

final class Context
{
    public function __construct(
        private readonly ILoginSocialite $strategy
    ) {}

    public function login(SocialiteUser $user): void
    {
        $this->strategy->login($user);
    }
}
