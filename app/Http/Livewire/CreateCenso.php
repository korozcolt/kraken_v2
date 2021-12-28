<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use Livewire\Component;

class CreateCenso extends Component
{
    public $open = false;
    public $name, $last, $dni, $program, $study;

    protected $rules = [
        'name' => 'required|max:50',
        'last' => 'required|max:50',
        'dni' => 'numeric|required|unique:censos,dni',
        'program' => 'required',
        'study' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'program.required' => 'Programa requerido',
        'study.required' => 'Estudios requeridos'
    ];

    public function render(){
        return view('livewire.create-censo');
    }

    public function save(){
        $this->validate();
        Censo::create([
            'name' => $this->name,
            'last' => $this->last,
            'dni' => $this->dni,
            'program' => $this->program,
            'study' => $this->study
        ]);
        $this->reset([
            'open','name','last','program','study'
        ]);
        $this->emitTo('censo-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Censo');
    }

}
