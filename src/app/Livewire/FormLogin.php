<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class FormLogin extends Component
{

    public LoginForm $form;

    public function submitFormLogin()
    {
        // TODO: Implement auth
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.form-login');
    }
}
