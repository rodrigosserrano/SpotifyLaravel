<?php

namespace App\Dto;

readonly class LoginDTO implements IDto
{
    public function __construct(
        public string $email,
        public bool $remember
    )
    {}
}
