<?php

namespace App\Livewire\Forms\Login;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email|min:5', as: 'email', message: 'O campo :attribute é obrigatório.')]
    public string $email = '';

    #[Rule('required|min:8', as: 'senha', message: 'O campo :attribute é obrigatório.')]
    public string $password = '';

    public bool $remember = false;
}
