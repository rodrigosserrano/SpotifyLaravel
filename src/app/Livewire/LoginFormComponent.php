<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class LoginFormComponent extends Component
{
    public LoginForm $form;

    public function submitFormLogin()
    {
        $this->validate();
        $user = User::where('email', $this->form->email)->first();

        $this->withValidator(fn (Validator $validator) =>
            $validator->after(function ($validator) use ($user) {
                if (!$user) {
                    $validator->errors()->add('user', 'Usuário ou senha inválidos');
                }
            })
        )->validate();

        Auth::login($user, $this->form->remember);

        $this->redirect('/');
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login-form-component');
    }
}
