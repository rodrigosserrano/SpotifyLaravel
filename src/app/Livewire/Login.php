<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Login extends Component
{
    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.login.login');
    }
}
