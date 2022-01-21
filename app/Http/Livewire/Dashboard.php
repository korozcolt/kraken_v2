<?php

namespace App\Http\Livewire;

use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use Livewire\Component;
use Carbon\Carbon;


class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
