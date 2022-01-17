<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use Livewire\Component;
use Carbon\Carbon;


class Dashboard extends Component
{
    public function render()
    {
        $censoTotal = Censo::all()->count();
        $coordinatorTotal = Coordinator::all()->count();
        $liderTotal = Lider::all()->count();
        $voterTotal = Voter::all()->count();
        $voterNotCalledTotal = Voter::where('status',1)->count();
        $voterNotAnswerTotal = Voter::where('status',2)->count();
        $voterWrongNumberTotal = Voter::where('status',3)->count();
        $voterBadWriteTotal = Voter::where('status',4)->count();
        $voterOutRangeTotal = Voter::where('status',5)->count();
        $voterDontKnowTotal = Voter::where('status',6)->count();
        $voterVersusTotal = Voter::where('status',7)->count();
        $voterWhiteTotal = Voter::where('status',8)->count();
        $voterRightTotal = Voter::where('status',9)->count();
        $voterNotAnswerCallOut = Voter::where('status',0)->count();
        $voterPerDay = Voter::whereDate('created_at',Carbon::now())->count();
        $liderPerDay = Lider::whereDate('created_at',Carbon::now())->count();
        return view('livewire.dashboard',compact(
            'censoTotal',
            'coordinatorTotal',
            'liderTotal',
            'voterTotal',
            'voterPerDay',
            'liderPerDay',
            'voterNotCalledTotal',
            'voterNotAnswerTotal',
            'voterBadWriteTotal',
            'voterWrongNumberTotal',
            'voterOutRangeTotal',
            'voterDontKnowTotal',
            'voterVersusTotal',
            'voterWhiteTotal',
            'voterRightTotal',
            'voterNotAnswerCallOut'
        ));
    }
}
