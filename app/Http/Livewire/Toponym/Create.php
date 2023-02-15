<?php

namespace App\Http\Livewire\Toponym;

use App\Models\Toponym;
use Livewire\Component;

class Create extends Component
{
    public
        $name,
        $alias,
        $status,
        $source,
        $prev_name,
        $language_origin,
        $meaning,
        $primary_latitude,
        $primary_longitude,
        $secondary_latitude,
        $secondary_longitude;

    protected $rules = [
        'name'      => 'required',
        'status'    => 'required',
        'source'    => 'required',
        'primary_latitude'  => 'required',
        'primary_longitude' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        Toponym::create($this->validate());
    }

    public function render()
    {
        return view('livewire.toponym.create');
    }
}
