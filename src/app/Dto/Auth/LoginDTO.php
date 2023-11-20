<?php

namespace App\Dto\Auth;

use App\Dto\IDTO;
use App\Exceptions\DtoInvalidDataException;
use Illuminate\Support\Facades\Validator;

readonly class LoginDTO implements IDTO
{
    /**
     * @throws \Exception
     */
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember = false,
    )
    {
        $validate = Validator::make(['email' => $this->email, 'password' => $this->password], [
            'email' => 'required|email|min:5',
            'password' => 'required|min:8',
        ]);

        if ($validate->fails()) {
            throw new DtoInvalidDataException(dtoInfoError: $validate->errors()->first());
        }
    }

    public function getCredentials(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function toArray(): array
    {
        return (array) $this;
    }
}
