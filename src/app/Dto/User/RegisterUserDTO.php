<?php

namespace App\Dto\User;

use App\Dto\IDTO;
use App\Entities\ConnectedAccount;
use App\Exceptions\DtoInvalidDataException;
use Illuminate\Support\Facades\Validator;

readonly class RegisterUserDTO implements IDTO
{
    /**
     * @throws DtoInvalidDataException
     */
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public ?string $password = null,
        public ?string $cpf = null,
        public ?string $birth_date = null,
        public ?string $picture_link = null,
        public ?ConnectedAccount $connectedAccount = null,
    )
    {
        $validate = Validator::make(
            [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => $this?->password,
                'cpf' => $this?->cpf,
                'birth_date' => $this?->birth_date
            ],
            [
                'first_name' => 'required|string|min:3',
                'last_name' => 'required|string|min:3',
                'email' => 'required|email|unique:users|min:5',
                'password' => 'nullable|min:8',
                'cpf' => 'nullable|cpf|unique:users|max:11',
                'birth_date' => 'nullable|date|before:01/01/2005',
            ]
        );

        if ($validate->fails()) {
            throw new DtoInvalidDataException(dtoInfoError: $validate->errors()->first());
        }
    }

    public function toArray(): array
    {
        return (array) $this;
    }
}
