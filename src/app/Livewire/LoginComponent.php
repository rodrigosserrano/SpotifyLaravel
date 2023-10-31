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
        // TODO: Validate not working, fix it
        $validator = (new LoginService())->execute(
            new LoginDTO(
                email: $this->form->email,
                remember: $this->form->remember,
            )
        );

        $this->withValidator($validator)->validate();
        $this->redirect(route('home'));
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login-component');
    }
}
