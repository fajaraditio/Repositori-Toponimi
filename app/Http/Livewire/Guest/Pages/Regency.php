<?php

namespace App\Http\Livewire\Guest\Pages;

use App\Models\Province;
use Livewire\Component;

class Regency extends Component
{
    public $province;

    public function mount(Province $province)
    {
        $this->province = $province;
    }

    public function render()
    {
        return view('livewire.guest.pages.regency')
            ->layout('layouts.guest');
    }
}
