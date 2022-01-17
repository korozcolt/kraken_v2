<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supervisor as SupervisorModel;
use Livewire\WithPagination;


class Supervisor extends Component
{
    use WithPagination;

    public $search = '';
    public $supervisor;
    public $open_edit = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort',
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    protected $rules = [
        'supervisor.name' => 'required',
        'supervisor.last' => 'required',
        'supervisor.dni' => 'required|numeric',
        'supervisor.phone' => 'required',
        
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Número requerido',
    ];

    public function mount(){
        $this->supervisor = new SupervisorModel();
    }

    public function loadSupervisor(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        if($this->readyToLoad){
            $supervisors = SupervisorModel::where('name','like','%' . $this->search . '%')
                ->orWhere('last','like','%' . $this->search . '%')
                ->orWhere('dni','like','%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else{
            $supervisors = [];
        }
        return view('livewire.supervisor',compact('supervisors'));
    }

    public function order($sortWeb){
        if($this->sort == $sortWeb){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{$this->sort = $sortWeb;$this->direction = 'asc';}
    }

    public function edit(SupervisorModel $supervisor){
        $this->supervisor = $supervisor;
        $this->open_edit = true;
    }

    public function delete(SupervisorModel $supervisor){
        $supervisor->delete();
    }

    public function update(){
        $this->validate();
        $this->supervisor->save();
        $this->reset(['open_edit']);
        $this->emit('alert','Se ha editado un Registro de Coordinador');
    }
}
