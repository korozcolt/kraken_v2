<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserCount extends Component
{
    use WithPagination;

    public $search = '';
    public $user;
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


    public function mount(){
        $this->user = new User();
    }

    public function loadUser(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        if($this->readyToLoad){
            $users = User::where('name','like','%' . $this->search . '%')
                ->orWhere('last','like','%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else{
            $users = [];
        }
        return view('livewire.user-count',compact('users'));
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

}
