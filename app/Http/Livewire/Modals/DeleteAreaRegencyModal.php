<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteAreaRegencyModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.delete-area-regency-modal');
    }
}
