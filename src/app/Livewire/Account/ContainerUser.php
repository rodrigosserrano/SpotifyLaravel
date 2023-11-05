<?php

namespace App\Livewire\Account;

use App\Entities\User;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ContainerUser extends Component
{
    public bool $formEditProfile = false;
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    #[On('user::updated')]
    public function setFormEditProfile(): void
    {
        $this->formEditProfile = !$this->formEditProfile;
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.container-user');
    }
}
