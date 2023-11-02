<?php

namespace App\Services\Auth;

use App\Dto\IDTO;
use App\Dto\LoginDTO;
use App\Entities\User;
use App\Facades\Repository;
use App\Services\IService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class LoginService implements IService
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
