<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use App\Models\Coordinator;
use App\Models\Lider;
use Livewire\Component;

class CreateLider extends Component
{
    public $open = false;
    public $name, $last, $dni, $phone, $phone2, $coordinator_id;

    protected $rules = [
        'name' => 'required|max:50',
        'last' => 'required|max:50',
        'dni' => 'numeric|required|unique:liders,dni',
        'phone' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Teléfono requerido',
    ];

    public function updatingDni(){
        $lider = Censo::where('dni','=',$this->dni)->first();
        if(!empty($lider)){
            $this->name = $lider->name;
            $this->last = $lider->last;
        }else{
            $this->name = "";
            $this->last = "";
        }
    }

    public function render(){
        $coordinators = Coordinator::orderBy('name')->get();
        return view('livewire.create-lider',compact('coordinators'));
    }

    public function save(){
        $this->validate();
        Lider::create([
            'name' => strtoupper($this->name),
            'last' => strtoupper($this->last),
            'dni' => trim($this->dni),
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'coordinator_id' => 1,
            'user_id' => \Auth::id(),
            'status' => 1
        ]);
        $this->reset([
            'open','name','last','phone','phone2'
        ]);
        $this->emitTo('lider-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Lider');
    }
}
