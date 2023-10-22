<?php

namespace App\Http\Livewire\Guest\Pages;

use Livewire\Component;

class Province extends Component
{
    public function render()
    {
        return view('livewire.guest.pages.province')
            ->layout('layouts.guest');
    }
}
