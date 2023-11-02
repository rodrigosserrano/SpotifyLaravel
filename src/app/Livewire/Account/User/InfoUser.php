<?php

namespace App\Livewire\Account\User;

use App\Entities\User;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class InfoUser extends Component
{
    public User $user;

    public function mount(User $user): void
    {
//        dd($user);
        $this->user = $user;
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.user.info-user');
    }
}
