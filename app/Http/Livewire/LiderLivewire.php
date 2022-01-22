<?php

namespace App\Http\Livewire;

use App\Models\Coordinator;
use App\Models\Lider;
use Livewire\Component;
use Livewire\WithPagination;

class LiderLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $coordinator;
    public $lider;
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
        'lider.firstname' => 'required',
        'lider.lastname' => 'required',
        'lider.dni' => 'required|numeric',
        'lider.phone' => 'required',
        'lider.coordinator_id' => 'required'
    ];

    protected $messages = [
        'firstname.required' => 'Nombre requerido',
        'lastname.required' => 'Apellido requerido',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Número requerido',
        'coordinator_id.required' => 'Coordinador requerido',
    ];

    protected $listeners = [
        'render', 'delete'
    ];

    public function mount(){
        $this->lider = new Lider();
    }

    public function loadLider(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        if($this->readyToLoad){
            $liders = Lider::where('firstname','like','%' . $this->search . '%')
                ->orWhere('lastname','like','%' . $this->search . '%')
                ->orWhere('dni','like','%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else{
            $liders = [];
        }
        $coordinators = Coordinator::where('status','ACTIVE')->orderBy('firstname')->get();
        return view('livewire.lider-livewire',compact('liders','coordinators'));
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

    public function edit(Lider $lider){
        $this->lider = $lider;
        $this->open_edit = true;
    }

    public function delete(Lider $lider){
        $lider->delete();
    }

    public function update(){
        $this->validate();
        $this->lider->save();
        $this->reset(['open_edit']);
        $this->emit('alert','Se ha editado un Registro de Lider');
    }
}
