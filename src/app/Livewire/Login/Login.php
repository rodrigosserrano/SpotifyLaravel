<?php

namespace App\Livewire\Login;

use App\Livewire\Forms\Login\LoginForm;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Validator;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    /**
     * @throws \Exception
     */
    public function submitFormLogin(): void
    {
        $this->validate();
        $auth = $this->form->auth();
        $this->withValidator(fn (Validator $validator) =>
            $validator->after(function ($validator) use ($auth) {
                if (!$auth) {
                    $validator->errors()->add('user', 'Usuário ou senha inválido');
                }
            })
        )->validate();
        $this->redirect(route('account'));
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login');
    }
}
