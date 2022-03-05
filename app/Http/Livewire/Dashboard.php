<?php

namespace App\Http\Livewire;

use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter01;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Censo;


class Dashboard extends Component
{
    public function render()
    {
        $voters = Voter01::count();
        $sincelejo = DB::table('censos')
                    ->join('voter01s','voter01s.place','=','censos.place')
                    ->select(DB::raw('count(*) as cantidad, censos.place as puesto'))
                    ->groupBy('censos.place')->get();

        $sucre = Voter01::where('city_id','<>','70001')->whereNotNull('place')->count();
        $noestan = Voter01::where('place', 'like','%CENSO%')
                            ->orWhere('place','like','%censo%')->count();
        //$notienencenso = Voter01::where('')->count();

        $censos = DB::table('censos')
                    ->join('voter01s','voter01s.place','=','censos.place')
                    ->select(DB::raw('count(*) as cantidad, censos.place as puesto'))
                    ->groupBy('censos.place')
                    ->get();
                    


        return view('livewire.dashboard', compact('sincelejo','voters','sucre','noestan','censos'));
    }
}
