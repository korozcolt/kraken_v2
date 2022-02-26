<?php

namespace App\Http\Livewire;

use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter01;
use Livewire\Component;
use Carbon\Carbon;


class Dashboard extends Component
{
    public function render()
    {
        $coordinators = Coordinator::all();
        $leaders = Lider::all();
        $voters = voter01::all();


        return view('livewire.dashboard', compact('coordinators','leaders','voters'));
    }
}
