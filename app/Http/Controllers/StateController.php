<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function getCities(State $state){
        return $state->city()->select('id','name')->get();
    }

    public function getState($id){
        return State::where('id',$id)->first();
    }

}
