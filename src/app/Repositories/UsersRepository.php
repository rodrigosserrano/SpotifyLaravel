<?php

namespace App\Repositories;

use App\Dto\User\EditUserDTO;
use App\Entities\ConnectedAccount;
use App\Entities\User;
use Illuminate\Support\Facades\Hash;


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

    public function updateAuthenticated(EditUserDTO $data): bool
    {
        return User::find(auth()->user()->id)->update($data->toArray());
    }

    public function create(
        string $firstName,
        string $lastName,
        string $email,
        ConnectedAccount $connectedAccount,
        ?string $pictureLink = null,
        ?string $password = null
    ): User
    {
        $user = User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'picture_link' => $pictureLink,
            'password' => Hash::make($password),
            'has_password' => !empty($password),
            'connected_account_id' => $connectedAccount->id,
        ]);

        $user->save();
        return $user;
    }
}
