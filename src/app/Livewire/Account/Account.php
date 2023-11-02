<?php

namespace App\Livewire\Account;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Account extends Component
{
    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.account', ['user' => Auth::user()]);
    }
}
