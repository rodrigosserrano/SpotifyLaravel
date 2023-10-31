<?php

namespace App\Services\Auth;

use App\Dto\IDto;
use App\Dto\LoginDTO;
use App\Facades\Repository;
use App\Services\IService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class LoginService implements IService
{
    /**
     * @param ?LoginDTO $data
     * @return callable
     */
    public function execute(?IDto $data): callable
    {
        $user = Repository::users()->getByEmail($data->email);

        return fn (Validator $validator) =>
            $validator->after(function ($validator) use ($user, $data) {
                if (!$user) {
                    $validator->errors()->add('user', 'Usuário ou senha inválido');
                } else {
                    Auth::login($user, $data->remember);
                }
            });
    }
}
