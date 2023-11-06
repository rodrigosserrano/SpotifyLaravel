<?php

namespace App\Repositories;

use App\Dto\User\EditUserDTO;
use App\Dto\User\RegisterUserDTO;
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

    public function create(RegisterUserDTO $data): User
    {
        $user = User::create([
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'picture_link' => $data->picture_link,
            'password' => $data->password,
            'has_password' => !empty($data->password),
            'connected_account_id' => $data?->connectedAccount?->id,
            'cpf' => $data?->cpf,
            'birth_date' => $data?->birth_date,
        ]);

        $user->save();
        return $user;
    }
}
