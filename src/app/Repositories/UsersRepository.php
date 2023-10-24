<?php

namespace App\Repositories;

use App\Models\User;


final class UsersRepository
{
    public function getByEmail(String $email): User
    {
        return User::where('email', $email)->first();
    }
}
