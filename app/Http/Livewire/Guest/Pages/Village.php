<?php

namespace App\Http\Livewire\Guest\Pages;

use Livewire\Component;
use App\Models\District;

class Village extends Component
{
    public $district;

    public function mount(District $district)
    {
        $this->district = $district;
    }

    public function render()
    {
        return view('livewire.guest.pages.village')
            ->layout('layouts.guest');
    }
}
