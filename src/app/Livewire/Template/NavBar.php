<?php

namespace App\Livewire\Template;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class NavBar extends Component
{
    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.template.nav-bar');
    }
}
