<?php

namespace App\Http\Livewire\Toponym;

use Livewire\Component;

class Create extends Component
{
    public $name;
    
    protected $rules = [
        'name' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
    }

    public function render()
    {
        return view('livewire.toponym.create');
    }
}
