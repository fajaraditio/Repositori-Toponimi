<?php

namespace App\Http\Livewire\Guest\Pages;

use App\Models\Regency;
use Livewire\Component;

class District extends Component
{
    public $regency;

    public function mount(Regency $regency)
    {
        $this->regency = $regency;
    }

    public function render()
    {
        return view('livewire.guest.pages.district')
            ->layout('layouts.guest');
    }
}
