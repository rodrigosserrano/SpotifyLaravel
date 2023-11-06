<?php

namespace App\Livewire\Forms\Register;

use App\Dto\User\RegisterUserDTO;
use App\Entities\User;
use App\Services\User\RegisterUserService;
use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Rule('required|string|min:3', as: 'nome', message: 'O campo :attribute é obrigatório.')]
    public string $first_name = '';

    #[Rule('required|string|min:3', as: 'nome', message: 'O campo :attribute é obrigatório.')]
    public string $last_name = '';

    #[Rule('required|email|min:5', as: 'email', message: 'O campo :attribute é obrigatório.')]
    public string $email = '';

    #[Rule('required|confirmed|min:8', as: 'senha', message: 'O campo :attribute é obrigatório.')]
    public string $password = '';

    #[Rule('required|min:8', as: 'confirmar senha', message: 'O campo :attribute é obrigatório.')]
    public string $password_confirmation = '';

    #[Rule('required|cpf|max:11', as: 'cpf', message: 'O campo :attribute não é válido.')]
    public string $cpf = '';

    #[Rule('date|before:01/01/2005', as: 'data de nascimento', message: 'O campo :attribute não é válido.')]
    public string $birth_date = '';

    /**
     * @throws \Exception
     */
    public function save(): void
    {
        $this->validate();
        (new RegisterUserService())->execute(new RegisterUserDTO(
            first_name: $this->first_name,
            last_name: $this->last_name,
            email: $this->email,
            password: $this->password,
            cpf: $this->cpf,
            birth_date: $this->birth_date,
        ));
    }
}
