<?php

namespace App\Livewire\Account\User;

use App\Entities\User;
use App\Livewire\Forms\Account\User\EditInfoUserForm;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class EditInfoUser extends Component
{
    public User $user;
    public EditInfoUserForm $form;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->form->cpf = $user?->cpf ?? '';
        $this->form->birth_date = $user?->birth_date ?? '';
    }

    /**
     * @throws \Exception
     */

    public function submitFormEdit(): void
    {
        $this->validate();
        $this->form->saveChanges();
        $this->dispatch('user::updated');
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.user.edit-info-user');
    }
}
