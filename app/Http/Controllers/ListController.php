<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Voter01;
use Illuminate\Support\Facades\DB;

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
            return redirect()->back()->with('error', 'Datos incorrectos');
        }
                   
        
    }
}