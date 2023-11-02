<?php

namespace App\Livewire;

use App\Dto\LoginDTO;
use App\Livewire\Forms\LoginForm;
use App\Services\Auth\LoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class LoginComponent extends Component
{
    public LoginForm $form;
    public function submitFormLogin(): void
    {
        $this->validate();
        $auth = (new LoginService())->execute(
            new LoginDTO(
                email: $this->form->email,
                password: $this->form->password,
                remember: $this->form->remember,
            )
        );

        $this->withValidator(fn (Validator $validator) =>
            $validator->after(function ($validator) use ($auth) {
                if (!$auth) {
                    $validator->errors()->add('user', 'Usuário ou senha inválido');
                }
            })
        )->validate();
        $this->redirect(route('home'));
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login-component');
    }
}
