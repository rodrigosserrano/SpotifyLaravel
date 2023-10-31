<?php

namespace App\Models\User;

use Laravel\Socialite\Contracts\User;

final class UserContext
{
    private IUserStrategy $strategy;

    public function setStrategy(IUserStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy(User $user)
    {
        return $this->strategy->execute($user);
    }
}
