<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Livewire\Component;

class Area extends Component
{
    public $province;
    public $district;
    public $regency;

    public $provinceId;
    public $regencyId;
    public $districtId;

    protected $queryString = ['provinceId', 'regencyId', 'districtId'];
    
    public function mount() {
        $this->province = Province::find($this->provinceId);
        $this->regency  = Regency::find($this->regencyId);
        $this->district = District::find($this->districtId);
    }

    public function render()
    {
        return view('livewire.dashboard.pages.area');
    }
}
