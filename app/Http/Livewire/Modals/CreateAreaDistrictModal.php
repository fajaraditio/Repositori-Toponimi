<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateAreaDistrictModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.create-area-district-modal');
    }
}
