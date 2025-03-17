<?php

namespace App\Livewire\App;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Homepage extends Component
{
    public function mount() {}

    public function render(): View
    {
        return view('livewire.app.homepage');
    }
}
