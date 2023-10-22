<?php

namespace App\Http\Livewire\Guest\Pages;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.guest.pages.about')
            ->layout('layouts.guest');
    }
}
