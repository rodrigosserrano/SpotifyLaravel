<?php

namespace App\Livewire\Account\Bills;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CardBillInfo extends Component
{
    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.account.bills.card-bill-info');
    }
}
