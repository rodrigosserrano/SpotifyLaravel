<?php

namespace App\Models\User;

use App\Entities\User;
use App\Facades\Repository;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class GetWithSocialiteStrategy implements IUserStrategy
{
    public function execute(SocialiteUser $user): ?User
    {
        return Repository::users()->getByGoogleAccountId($user->getId());
    }
}
