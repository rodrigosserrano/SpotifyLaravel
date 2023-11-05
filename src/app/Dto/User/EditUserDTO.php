<?php

namespace App\Dto\User;

use App\Dto\IDTO;

readonly class EditUserDTO implements IDTO
{
    public function __construct(
        public string $cpf,
        public string $birth_date,
    ) {}
}
