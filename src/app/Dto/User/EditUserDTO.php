<?php

namespace App\Dto\User;

use App\Dto\IDTO;
use Illuminate\Support\Facades\Validator;


readonly class EditUserDTO implements IDTO
{
    /**
     * @throws \Exception
     */
    public function __construct(
        public string $cpf,
        public string $birth_date,
    ) {
        $validate = Validator::make(['cpf' => $this->cpf, 'birth_date' => $this->birth_date], [
            'cpf' => 'required|cpf|max:11',
            'birth_date' => 'date|before:01/01/2005',
        ]);

        if ($validate->fails()) {
            throw new \Exception($validate->errors()->first());
        }
    }

    public function toArray(): array
    {
        return (array) $this;
    }
}
