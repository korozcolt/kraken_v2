<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use Livewire\Component;
use Livewire\WithPagination;


class CensoLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $censo;
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
        'censo.name' => 'required',
        'censo.last' => 'required',
        'censo.dni' => 'required|numeric',
        'censo.study' => 'required',
        'censo.program' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'program.required' => 'Programa requerido',
        'study.required' => 'Estudios requeridos'
    ];

    protected $listeners = [
        'render', 'delete'
    ];

    public function mount(){
        $this->censo = new Censo();
    }

    public function loadCenso(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        if($this->readyToLoad){
            $censos = Censo::where('name','like','%' . $this->search . '%')
                ->orWhere('last','like','%' . $this->search . '%')
                ->orWhere('dni','like','%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else{
            $censos = [];
        }
        return view('livewire.censo-livewire',compact('censos'));
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

    public function edit(Censo $censo){
        $this->censo = $censo;
        $this->open_edit = true;
    }

    public function delete(Censo $censo){
        $censo->delete();
    }

    public function update(){
        $this->validate();
        $this->censo->save();
        $this->reset(['open_edit']);
        $this->emit('alert','Se ha editado un Registro de Censo');
    }
}
