<?php

namespace App\Livewire\Account\User;

use App\Entities\UserStatus;
use App\Enums\UserStatusEnum;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class StatusUserTag extends Component
{
    public string $color;
    public string $status;

    public function mount(UserStatus $status): void
    {
        $this->color = match ($status->id) {
            UserStatusEnum::Complete->value => 'bg-success',
            UserStatusEnum::Pending->value => 'bg-danger',
        };
        $this->status = $status->name;
    }

    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.user.status-user-tag');
    }
}
