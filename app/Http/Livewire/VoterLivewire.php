<?php

namespace App\Http\Livewire;

use App\Models\Lider;
use App\Models\Voter;
use App\Models\Censo;
use Livewire\Component;
use Livewire\WithPagination;

class VoterLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $lider;
    public $voter;
    public $open_edit = false;
    public $open_status = false;
    public $sort = 'firstname';
    public $direction = 'asc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort',
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    protected $rules = [
        'voter.firstname' => 'required',
        'voter.lastname' => 'required',
        'voter.dni' => 'required|numeric',
        'voter.phone' => 'required',
        'voter.lider_id' => 'required',
        'voter.find' => 'numeric',
    ];

    protected $messages = [
        'firstname.required' => 'Nombre requerido',
        'lastname.required' => 'Apellido requerido',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Número requerido',
        'lider_id.required' => 'Lider requerido',
        'find.numeric' => 'Estado de voto requerido',
    ];

    protected $listeners = [
        'render', 'delete'
    ];

    public function mount(){
        $this->voter = new Voter();
    }

    public function loadVoter(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        if($this->readyToLoad){
            $voters = voter::where('firstname','like','%' . $this->search . '%')
                ->orWhere('lastname','like','%' . $this->search . '%')
                ->orWhere('dni','LIKE',$this->search)
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else{
            $voters = [];
        }
        $liders = Lider::where('status','ACTIVE')->orderBy('firstname')->get();
        return view('livewire.voter-livewire',compact('voters','liders'));
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

    public function edit(Voter $voter){
        $this->voter = $voter;
        $this->open_edit = true;
    }

    public function status_update(Voter $voter){
        $this->voter = $voter;
        $this->open_status = true;
    }

    public function updateCall(Voter $voter){
        $this->validate();
        $this->voter->save();
        $this->reset(['open_status']);
        $this->emit('alert','Se ha editado un votante');
    }

    public function delete(Voter $voter){
        $voter->delete();
    }

    public function update(){
        $this->validate();
        $this->voter->save();
        $this->reset(['open_edit']);
        $this->emit('alert','Se ha editado un Registro de votante');
    }
}
