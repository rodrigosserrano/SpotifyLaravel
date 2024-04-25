<?php

namespace App\Models\User\LoginSocialite;

use App\Models\User\LoginSocialite\Strategies\CreateWithSocialite;
use App\Models\User\LoginSocialite\Strategies\GetWithSocialite;
use Laravel\Socialite\Contracts\User;

class LoginSocialite
{
    public static function execute(User $user): void
    {
        $existsUser = \App\Entities\User::where('email', $user->getEmail())->exists();

        $strategy = match (true) {
            $existsUser     => new GetWithSocialite(),
            default         => new CreateWithSocialite(),
        };

        (new Context($strategy))->login($user);
    }
}
