<?php

namespace App\Repositories;

use App\Entities\User;


final class UsersRepository
{
    public function getByEmail(String $email): User
    {
        return User::where('email', $email)->first();
    }

    public function getByGoogleAccountId(string $googleId): ?User
    {
        return User::whereRelation('connectedAccounts', 'google_id', $googleId)->first();
    }
}
