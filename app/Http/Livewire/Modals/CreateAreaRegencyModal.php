<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateAreaRegencyModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.create-area-regency-modal');
    }
}
