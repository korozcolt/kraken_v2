<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\City;
use App\Models\Supervisor;
use Carbon\Carbon;

class CreateSupervisor extends Component
{
    public $open = false;
    public $firstname, $lastname, $dni, $phone, $phone_two, $address, $birthdate, $son_number, $status,  $city_id, $guide, $witness, $comment, $gender;
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
    

    protected $rules = [
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
        'dni' => 'numeric|required|unique:supervisors,dni',
        'phone' => 'numeric|required',
        'phone_two' => 'numeric|nullable',
        'address' => 'nullable|max:100',
        'birthdate' => 'required',
        'son_number' => 'numeric|nullable',
        'comment' => 'nullable|max:255', 
    ];

    protected $messages = [
        'firstname.required' => 'Nombre requerido',
        'lastname.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'phone.required' => 'Teléfono requerido',
        'phone.numeric' => 'El teléfono debe ser un numero sin letras o caracteres',
        'phone_two.numeric' => 'El teléfono debe ser un numero sin letras o caracteres',
        'address.max' => 'La dirección no debe exceder los 100 caracteres',
        'birthdate.required' => 'La fecha debe ser una fecha valida',
        'son_number.numeric' => 'El número de hijos debe ser un numero sin letras o caracteres',
        'comment.max' => 'El comentario no debe exceder los 255 caracteres'
    ];

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('state_id', $state)->get();
        }
    }

    public function render()
    {
        return view('livewire.create-supervisor');
    }

    public function save(){
        $this->validate();
        Supervisor::create([
            'firstname' => strtoupper($this->firstname),
            'lastname' => strtoupper($this->lastname),
            'dni' => $this->dni,
            'phone' => $this->phone,
            'phone_two' => $this->phone_two,
            'address' => strtoupper($this->address),
            'birthdate' => $this->birthdate,
            'son_number' => $this->son_number,
            'status' => 'ACTIVE',
            'city_id' => $this->selectedCity,
            'guide' => 'false',
            'witness' => 'false',
            'comment' => $this->comment,
            'gender' => $this->gender,
            'user_id'=> \Auth::id(),
        ]);
        $this->reset([
            'open','firstname','lastname','phone','phone_two','address','birthdate','son_number','status','city_id','guide','witness','comment','gender'
        ]);
        $this->emitTo('supervisor-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Supervisor');
    }
}
