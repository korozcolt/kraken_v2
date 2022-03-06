<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Voter01;
use Illuminate\Support\Facades\DB;
use App\Models\Censo;

class ListController extends Controller
{
    public function listadoCoordinadores(){
        Coordinator::all();
        Lider::all();
        Voter01::all();
        
    }

    public function index(){
        return view('lists.login-coordinator');
    }

    public function income(Request $request){
        $coordinator = Coordinator::where('dni', $request->dni)->first();
        $contraseña = substr($coordinator->firstname, 0,2) . substr($coordinator->dni, -4);

        if($coordinator && ($contraseña == $request->password)){
            //$voters = Voter01::where('coordinator_dni', $request->dni)->get();
            $voters = DB::table('voter01s as v')
            ->join('coordinators as c','v.coordinator_dni','=','c.dni')
            ->leftJoin('liders as l','v.lider_dni','=','l.dni')
            ->select('v.*','c.firstname as coordinator_firstname','c.lastname as coordinator_lastname','l.firstname as lider_firstname','l.lastname as lider_lastname')
            ->where('v.coordinator_dni', $request->dni)
            ->orderBy('l.id','desc')
            ->get();

            return view('lists.list-by-coordinator', compact('voters', 'coordinator'));
        }else {
            return abort(404);
        }   
    }

    public function coordinators(){
        $coordinators = Coordinator::all();
        return view('lists.list-coordinator', compact('coordinators'));
    }

    public function places(){
        $censos = Censo::all();
        return view('lists.list-censo', compact('censos'));
    }

    public function tables($place){
        $table = DB::table('voter01s as v')
            ->select('v.*')
            ->where('v.place','like', $place)
            ->get();
        return view('lists.list-tables', compact('table'));
    }

    public function voters($id){
        $coordinator = Coordinator::where('dni', $id)->get();
        $voter = DB::table('voter01s as v')
            ->join('coordinators as c','v.coordinator_dni','=','c.dni')
            ->leftJoin('liders as l','v.lider_dni','=','l.dni')
            ->select('v.*','c.firstname as coordinator_firstname','c.lastname as coordinator_lastname','l.firstname as lider_firstname','l.lastname as lider_lastname')
            ->where('v.coordinator_dni', $id)
            ->orderBy('l.firstname','asc')
            ->get();
        return view('lists.list-voter', compact('coordinator','voter'));
    }

    public function placers($place){
        $voter = DB::table('voter01s as v')
            ->join('coordinators as c','v.coordinator_dni','=','c.dni')
            ->leftJoin('liders as l','v.lider_dni','=','l.dni')
            ->select('v.*','c.firstname as coordinator_firstname','c.lastname as coordinator_lastname','l.firstname as lider_firstname','l.lastname as lider_lastname')
            ->where('v.place', $place)
            ->orderBy('v.table','asc')
            ->get();
        return view('lists.list-voter', compact('voter'));
    }

}
