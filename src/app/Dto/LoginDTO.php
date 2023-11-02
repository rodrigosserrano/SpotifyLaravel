<?php

namespace App\Dto;

readonly class LoginDTO implements IDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember = false,
    )
    {}

    public function getCredentials(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
