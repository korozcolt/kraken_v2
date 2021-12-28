<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coordinator;
use Livewire\WithPagination;

class CoordinatorLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $coordinator;
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
        'coordinator.name' => 'required',
        'coordinator.last' => 'required',
        'coordinator.dni' => 'required|numeric',
        'coordinator.phone' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Número requerido',
    ];

    protected $listeners = [
        'render', 'delete'
    ];

    public function mount(){
        $this->coordinator = new Coordinator();
    }

    public function loadCoordinator(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        if($this->readyToLoad){
            $coordinators = Coordinator::where('name','like','%' . $this->search . '%')
                ->orWhere('last','like','%' . $this->search . '%')
                ->orWhere('dni','like','%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else{
            $coordinators = [];
        }
        return view('livewire.coordinator-livewire',compact('coordinators'));
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

    public function edit(Coordinator $coordinator){
        $this->coordinator = $coordinator;
        $this->open_edit = true;
    }

    public function delete(Coordinator $coordinator){
        $coordinator->delete();
    }

    public function update(){
        $this->validate();
        $this->coordinator->save();
        $this->reset(['open_edit']);
        $this->emit('alert','Se ha editado un Registro de Coordinador');
    }
}
