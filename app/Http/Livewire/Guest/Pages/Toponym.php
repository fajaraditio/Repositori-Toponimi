<?php

namespace App\Http\Livewire\Guest\Pages;

use Livewire\Component;
class Toponym extends Component
{
    public function render()
    {
        return view('livewire.guest.pages.toponym')
            ->layout('layouts.guest');
    }
}
