<?php

namespace App\Http\Livewire\Toponym;

use App\Models\Category;
use App\Models\Classes;
use App\Models\Element;
use App\Models\Toponym;
use Livewire\Component;

class Create extends Component
{
    public
        $element_id,
        $class_id,
        $category_id,
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

    public $elements, $categories, $classes;

    protected $rules = [
        'element_id'    => 'required',
        'class_id'      => 'required',
        'name'          => 'required',
        'status'        => 'required',
        'source'        => 'required',
        'primary_latitude'  => 'required',
        'primary_longitude' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->elements     = Element::get();
        $this->categories   = Category::get();
        $this->classes      = Classes::get();
    }

    public function save()
    {
        Toponym::create($this->validate());

        session()->flash('message', __(':table ":value" succesfully created.', [
            'table' => 'Toponym',
            'value' => $this->name
        ]));

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.toponym.create');
    }
}
