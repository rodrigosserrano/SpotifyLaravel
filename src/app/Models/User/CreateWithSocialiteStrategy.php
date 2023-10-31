<?php

namespace App\Models\User;

use App\Entities\ConnectedAccount;

use App\Entities\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class CreateWithSocialiteStrategy implements IUserStrategy
{
    public function execute(SocialiteUser $user): User
    {
        try {
            $connectedAccount = ConnectedAccount::create([
                'google_id' => $user->getId(),
            ]);

            $firstName = explode(' ', $user->getName())[0] ?? null;
            $lastName = explode(' ', $user->getName())[1] ?? null;

            $newUser = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $user->getEmail(),
                'picture_link' => $user->getAvatar(),
                'password' => Hash::make(''),
                'has_password' => false,
                'connected_account_id' => $connectedAccount->id,
            ]);

            $newUser->save();

            return $newUser;
        } catch (Exception $e) {
            Log::error('Error creating user with socialite strategy: ' . $e->getMessage());
            throw $e;
        }
    }
}
