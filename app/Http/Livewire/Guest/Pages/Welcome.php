<?php

namespace App\Http\Livewire\Guest\Pages;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.guest.pages.welcome')
            ->layout('layouts.guest');
    }
}
