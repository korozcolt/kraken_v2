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
}
