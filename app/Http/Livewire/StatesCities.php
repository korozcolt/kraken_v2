<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\City;

class StatesCities extends Component
{
    public $states;
    public $cities;

    public $selectedState = null;
    public $selectedCity = null;

    public function mount()
    {
        $this->states = State::all();
        $this->cities = collect();
        $this->selectedCity = null;

        if(!is_null($this->selectedCity)){
            $city = City::where('state_id', $this->selectedState)->get();
            if($city){
                $this->cities = City::where('state_id', $city->state_id)->get();
                $this->selectedState = $city->state_id;
            }
        }
    }

    public function render()
    {
        
        return view('livewire.states-cities');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('state_id', $state)->get();
        }
    }
}
