<?php

namespace App\Livewire\Login;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Login extends Component
{
    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login');
    }
}
