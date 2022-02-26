<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Voter01;

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
        $voters = Voter01::where('coordinator_dni', $request->dni)->get();
        
        return view('lists.list-by-coordinator', compact('voters', 'coordinator'));
        
    }
}
