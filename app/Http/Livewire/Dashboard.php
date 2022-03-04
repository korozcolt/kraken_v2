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
        $voters = Voter01::count();
        $sincelejo =Voter01::where('city_id', '70001')
                            ->whereNotNull('place')->count();

        $sucre = Voter01::where('city_id','<>','70001')->whereNotNull('place')->count();
        $noestan = Voter01::where('place', 'like','%CENSO%')
                            ->orWhere('table','like','%no%')->count();                        


        return view('livewire.dashboard', compact('sincelejo','voters','sucre','noestan'));
    }
}
