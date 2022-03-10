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
                    ->join('voter01s',DB::raw('trim(voter01s.place)'),'=',DB::raw('trim(censos.place)'))
                    ->select(DB::raw('count(*) as cantidad, censos.place as puesto'))
                    ->where('city_id','=','70001')
                    ->groupBy('censos.place')
                    ->get();

        $sucre = Voter01::where('city_id','<>','70001')->where('city_id','<>','1')->whereNotNull('city_id')->count();
        $noestan = Voter01::where('city_id', '1')->count();
        //$notienencenso = Voter01::where('')->count();

        $censos = DB::table('censos')
                    ->join('voter01s',DB::raw('trim(voter01s.place)'),'=',DB::raw('trim(censos.place)'))
                    ->select(DB::raw('count(*) as cantidad, censos.place as puesto'))
                    ->where('city_id','=','70001')
                    ->groupBy('censos.place')
                    ->orderBy('cantidad','desc')
                    ->get();

        $totalCensoWO = 0;
        $totalCensoSucre = 0;
        foreach ($sincelejo as $value)
        {
            $totalCensoWO += $value->cantidad;
        }
        $totalCensoSucre = $sucre + $totalCensoWO;
        $totalAprobado = $voters - ($totalCensoSucre + $noestan) ;

        return view('livewire.dashboard', compact('sincelejo','voters','sucre','noestan','censos','totalAprobado','totalCensoSucre', 'totalCensoWO'));
    }
}
