<?php

namespace App\Http\Livewire\Guest\Pages;

use App\Models\Toponym;
use Livewire\Component;

class ViewToponym extends Component
{
    public $toponym;

    public function mount(Toponym $toponym)
    {
        $this->toponym = $toponym;
    }

    public function render()
    {
        return view('livewire.guest.pages.view-toponym')
            ->layout('layouts.guest');
    }
}
