<?php

namespace App\Livewire\Account;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ContainerBills extends Component
{
    public function mount(): void
    {
        sleep(2);
    }

    public function placeholder(): View|Application|Factory|ApplicationContract
    {
        return view('components.placeholders.account.container-bills-placeholder');
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.container-bills');
    }
}
