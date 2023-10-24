<?php

namespace App\Livewire;

use App\Facades\Repository;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class LoginFormComponent extends Component
{
    public LoginForm $form;

    public function submitFormLogin(): void
    {
        $this->validate();
        $user = Repository::users()->getByEmail($this->form->email);

        $this->withValidator(fn (Validator $validator) =>
            $validator->after(function ($validator) use ($user) {
                if (!$user) {
                    $validator->errors()->add('user', 'Usuário ou senha inválido');
                }
            })
        )->validate();

        Auth::login($user, $this->form->remember);

        $this->redirect(route('home'));
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login-form-component');
    }
}
