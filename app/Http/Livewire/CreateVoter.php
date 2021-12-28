<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use App\Models\Voter;
use App\Models\Lider;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CreateVoter extends Component
{
    public $open = false;
    public $name, $last, $dni, $phone, $phone2, $lider_id;

    public function updatedDni(){
        $voter = Voter::where('dni','=',$this->dni)->first();
        if(!empty($voter)){
            $this->name = $voter->name;
            $this->last = $voter->last;
        }else{
            $this->name = "";
            $this->last = "";
        }
    }

    public function render(){
        $liders = Lider::orderBy('name')->get();

//        $urlsms = "https://api103.hablame.co/api/sms/v3/send/marketing";
//        $apikeysms = "p3pfwXXgfv5KwSYTFmJSzJaY2G2c7n";
//        $tokensms = "2e804507282e51deedfecbc39414eb24";
//        $accountsms = "10022622";
//
//        $response = Http::acceptJson()->withHeaders([
//            'account' => $accountsms,
//            'apiKey' => $apikeysms,
//            'token' => $tokensms
//        ])->post($urlsms, [
//            'toNumber' => '3016859339',
//            'sms' => 'Texto de prueba',
//            'flash' => 0,
//            'sc' => '890202',
//            'request_dlvr_rcpt' => '0',
//        ]);

        return view('livewire.create-voter',compact('liders'));
    }

    public function save(){
        $voter = voter::where('dni',$this->dni)->first();
        $name = "";
        $last = "";
        if($voter != null){
            $name = $voter->lider->name;
            $last = $voter->lider->last;
        }
        $this->validate([
            'name' => 'required|max:50',
            'last' => 'required|max:50',
            'dni' => 'required|unique:voters,dni',
            'phone' => 'required',
            'lider_id' => 'required'
        ],[
            'name.required' => 'Nombre requerido',
            'last.required' => 'Apellido requerido',
            'dni.unique' => 'Este número ya se encuentra en uso por '.$name.' '.$last,
            'dni.required' => 'La cedula es campo obligatorio',
            'phone.required' => 'Teléfono requerido',
            'lider_id.required' => 'Lider requerido',
        ]);
        Voter::create([
            'name' => strtoupper($this->name),
            'last' => strtoupper($this->last),
            'dni' => trim($this->dni),
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'lider_id' => $this->lider_id,
            'user_id' => \Auth::id(),
            'status' => 1
        ]);

        $this->reset([
            'open','name','last','dni','phone','phone2'
        ]);
        $this->emitTo('voter-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Votante');
    }
}
