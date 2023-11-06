<?php

namespace App\Livewire\Forms\Login;

use App\Dto\Auth\LoginDTO;
use App\Services\Auth\LoginService;
use Illuminate\Validation\Validator;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email|min:5', as: 'email', message: 'O campo :attribute é obrigatório.')]
    public string $email = '';

    #[Rule('required|min:8', as: 'senha', message: 'O campo :attribute é obrigatório.')]
    public string $password = '';

    public bool $remember = false;

    /**
     * @throws \Exception
     */
    public function auth(): bool
    {
        return (new LoginService())->execute(
            new LoginDTO(
                email: $this->email,
                password: $this->password,
                remember: $this->remember,
            )
        );
    }
}
