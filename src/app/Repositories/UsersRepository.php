<?php

namespace App\Repositories;

use App\Entities\User;


final class UsersRepository
{
    public function getByEmail(String $email): User
    {
        return User::where('email', $email)->first();
    }

    public function getByProviderAccountId(string $providerId): ?User
    {
        return User::whereRelation('connectedAccounts', 'provider_id', $providerId)->first();
    }
}
