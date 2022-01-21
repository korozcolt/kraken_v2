<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;

class CreateSupervisor extends Component
{
    public $open = false;
    public $firstname, $lastname, $dni, $phone, $phone_two, $address, $birthdate, $son_number, $status,  $city_id, $guide, $witness, $comment;

    protected $rules = [
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
        'dni' => 'numeric|required|unique:supervisors,dni',
        'phone' => 'numeric|required',
        'phone_two' => 'numeric|nullable',
        'address' => 'nullable|max:100',
        'birthdate' => 'date|nullable',
        'son_number' => 'numeric|nullable',
        'city_id' => 'required',
        'guide' => 'boolean',
        'witness' => 'boolean',
        'comment' => 'nullable|max:255'
    ];

    protected $messages = [
        'firstname.required' => 'Nombre requerido',
        'lastname.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Teléfono requerido',
        'phone.numeric' => 'El teléfono debe ser un numero sin letras o caracteres',
        'phone_two.numeric' => 'El teléfono debe ser un numero sin letras o caracteres',
        'address.max' => 'La dirección no debe exceder los 100 caracteres',
        'birthdate.date' => 'La fecha debe ser una fecha valida',
        'son_number.numeric' => 'El número de hijos debe ser un numero sin letras o caracteres',
        'city_id.required' => 'La ciudad es campo obligatorio',
        'guide.boolean' => 'El campo debe ser un booleano',
        'witness.boolean' => 'El campo debe ser un booleano',
        'comment.max' => 'El comentario no debe exceder los 255 caracteres'
    ];

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
            'city_id' => $this->city_id,
            'guide' => $this->guide,
            'witness' => $this->witness,
            'comment' => $this->comment,
        ]);
        $this->reset([
            'open','firstname','lastname','phone','phone_two','address','birthdate','son_number','status','user_id','city_id','guide','witness','comment'
        ]);
        $this->emitTo('supervisor','render');
        $this->emit('alert','Se ha creado un Registro de Supervisor');
    }
}
