<?php

namespace App\Services\Auth;

use App\Dto\IDTO;
use App\Dto\Auth\LoginDTO;
use App\Entities\User;
use App\Services\IService;
use Illuminate\Support\Facades\Auth;

final class LoginService implements IService
{
    /**
     * @param ?LoginDTO $data
     * @return bool
     */
    public function execute(?IDTO $data): bool
    {
        return Auth::attemptWhen(
            credentials: $data->getCredentials(),
            callbacks: [
                fn (User $user) => !$user->deleted,
                fn (User $user) => $user->has_password
            ],
            remember: $data->remember,
        );
    }
}
