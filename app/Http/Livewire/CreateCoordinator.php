<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coordinator;

class CreateCoordinator extends Component
{
    public $open = false;
    public $name, $last, $dni, $phone;

    protected $rules = [
        'name' => 'required|max:50',
        'last' => 'required|max:50',
        'dni' => 'numeric|required|unique:coordinators,dni',
        'phone' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Teléfono requerido',
    ];

    public function render(){
        return view('livewire.create-coordinator');
    }

    public function save(){
        $this->validate();
        Coordinator::create([
            'name' => $this->name,
            'last' => $this->last,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'status' => 1
        ]);
        $this->reset([
            'open','name','last','phone'
        ]);
        $this->emitTo('coordinator-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Coordinador');
    }
}
