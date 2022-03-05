<?php

namespace App\Http\Livewire;

use App\Models\Lider;
use App\Models\Voter01;
use App\Models\Censo;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\State;
use App\Models\City;
use Auth;

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
    public $states;
    public $cities;

    public $selectedState = null;
    public $selectedCity = null;

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort',
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    protected $rules = [
        'voter.dni' => 'required|numeric',
        'voter.place' => 'max:100',
        'voter.table' => 'max:100',
        'voter.city_id' => 'numeric',
        'voter.firstname' => 'required|max:100',
        'voter.lastname' => 'required|max:100',
    ];

    protected $messages = [
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
    ];

    protected $listeners = [
        'render', 'delete'
    ];

    
    public function mount(){
        $this->voter = new Voter01();
        $this->cities = City::where('state_id','70')->get();
        $this->city_id = null;
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
            
            if(Auth::user()->role == 'SUPERADMIN'){
                $voters = Voter01::select('dni','id','firstname','lastname','phone','lider_dni','coordinator_dni','city_id','table','place')
                ->where('firstname','like','%' . $this->search . '%')
                ->orWhere('lastname','like','%' . $this->search . '%')
                ->orWhere('dni','LIKE',$this->search)
                ->distinct('dni')
                ->paginate($this->cant);
            }else if(Auth::user()->role == 'VERIFIER'){
                $voters = Voter01::select('dni','id','firstname','lastname','phone','lider_dni','coordinator_dni','city_id','table','place')
                ->where('guide','true')
                ->distinct('dni')
                ->paginate($this->cant);
            }else{
                $voters = Voter01::select('dni','id','firstname','lastname','phone','lider_dni','coordinator_dni','city_id','table','place')
                ->where('coordinator_dni',Auth::user()->dni)
                // ->where('firstname','like','%' . $this->search . '%')
                // ->orWhere('lastname','like','%' . $this->search . '%')
                //->orWhere('dni','LIKE',$this->search)
                ->distinct('dni')
                ->paginate($this->cant);
            }
        }else{
            $voters = [];
        }
        return view('livewire.voter-livewire',compact('voters'));
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

    public function edit($id){
        
        $voter01 = Voter01::find($id);
        $this->voter = $voter01;
        $this->open_edit = true;
    }

    public function status_update(Voter01 $voter){
        $this->voter = $voter;
        $this->open_status = true;
    }

    public function updateCall(Voter01 $voter){
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
