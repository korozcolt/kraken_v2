<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Censo;
use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use DB;
use Illuminate\Support\Collection;

class ShowPlaces extends Component
{
    public function render()
    {
        $B2A104 = DB::table('voters as v')
                                    ->join('censos as c','v.dni','=','c.dni')
                                    ->where(function($query){
                                        return $query->where('v.status','=',1)
                                                    ->orWhere('v.status','=',2)
                                                    ->orWhere('v.status','=',3)
                                                    ->orWhere('v.status','=',4)
                                                    ->orWhere('v.status','=',5)
                                                    ->orWhere('v.status','=',6)
                                                    ->orWhere('v.status','=',0)
                                                    ->orWhere('v.status','=',9);
                                    })
                                    ->where(function ($query){
                                        return $query->where('c.program','like','INGENIERÍA AGRÍCOLA')
                                            ->orWhere('c.program','like','INGENIERÍA AGROINDUSTRIAL')
                                            ->orWhere('c.program','like','INGENIERÍA CIVIL')
                                            ->orWhere('c.program','like','TECNOLOGÍA EN ELECTRÓNICA INDUSTRIAL')
                                            ->orWhere('c.program','like','TECNOLOGÍA EN ELECTRÓNICA')
                                            ->orWhere('c.program','like','TECNOLOGÍA EN OBRAS CIVILES');
                                    })->count();
        $B3A101 = DB::table('voters as v')
                                    ->join('censos as c','v.dni','=','c.dni')
            ->where(function($query){
                return $query->where('v.status','=',1)
                    ->orWhere('v.status','=',2)
                    ->orWhere('v.status','=',3)
                    ->orWhere('v.status','=',4)
                    ->orWhere('v.status','=',5)
                    ->orWhere('v.status','=',6)
                    ->orWhere('v.status','=',0)
                    ->orWhere('v.status','=',9);
            })
                                    ->where(function ($query){
                                        return $query->where('c.program','like','ADMINISTRACIÓN DE EMPRESAS')
                                            ->orWhere('c.program','like','CONTADURÍA PÚBLICA')
                                            ->orWhere('c.program','like','DIRECCIÓN Y ADM. EMPRESAS ÉNF. FINANZAS')
                                            ->orWhere('c.program','like','DIRECCIÓN Y ADM. EMPRESAS ÉNF.MERCADEO')
                                            ->orWhere('c.program','like','ECONOMÍA')
                                            ->orWhere('c.program','like','TEC. GESTIÓN EMPRESARIAL')
                                            ->orWhere('c.program','like','DERECHO')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN EN DERECHO ADMINISTRATIVO')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN EN GERENCIA DE PROYECTOS')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN EN GERENCIA PÚBLICA')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN EN GERENCIA TALENTO HUMANO');
                                    })->count();
        $B3A203 = DB::table('voters as v')
                                     ->join('censos as c','v.dni','=','c.dni')
            ->where(function($query){
                return $query->where('v.status','=',1)
                    ->orWhere('v.status','=',2)
                    ->orWhere('v.status','=',3)
                    ->orWhere('v.status','=',4)
                    ->orWhere('v.status','=',5)
                    ->orWhere('v.status','=',6)
                    ->orWhere('v.status','=',0)
                    ->orWhere('v.status','=',9);
            })
                                     ->where(function ($query){
                                         return $query->where('c.program','like','%EDU%')
                                                      ->orWhere('c.program','like','%LIC%')
                                                      ->orWhere('c.program','like','%BIOLOGÍA')
                                                      ->orWhere('c.program','like','ESPECIALIZACIÓN EN BIOMETRÍA')
                                                      ->orWhere('c.program','like','MAESTRÍA EN CIENCIAS AMBIENTALES RED SUE CARIBE')
                                                      ->orWhere('c.program','like','MAESTRÍA EN CIENCIAS FÍSICAS RED SUE CARIBE')
                                                      ->orWhere('c.program','like','DOCTORADO EN CIENCIAS FISICAS')
                                                      ->orWhere('c.program','like','ESPECIALIZACIÓN EN GERENCIA DE LA EDUCACIÓN')
                                                      ->orWhere('c.program','like','ESPECIALIZACIÓN EN CIENCIAS AMBIENTALES')
                                                      ->orWhere('c.program','like','ESPECIALIZACIÓN EN CIENCIAS AMBIENTALES');
                                     })->count();
        $B4A102 = DB::table('voters as v')
                                    ->join('censos as c','v.dni','=','c.dni')
            ->where(function($query){
                return $query->where('v.status','=',1)
                    ->orWhere('v.status','=',2)
                    ->orWhere('v.status','=',3)
                    ->orWhere('v.status','=',4)
                    ->orWhere('v.status','=',5)
                    ->orWhere('v.status','=',6)
                    ->orWhere('v.status','=',0)
                    ->orWhere('v.status','=',9);
            })
                                    ->where(function ($query){
                                        return $query->where('c.program','like','FONOAUDIOLOGÍA')
                                            ->orWhere('c.program','like','ENFERMERÍA')
                                            ->orWhere('c.program','like','MEDICINA')
                                            ->orWhere('c.program','like','TEC. ENFERMERÍA')
                                            ->orWhere('c.program','like','TEC. REGENCIA DE FARMACIA')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN EN SEGURIDAD Y SALUD EN EL TRABAJO')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN GESTIÓN DE LA PROMOCIÓN Y PREVENCIÓN EN SALUD')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN SALUD FAMILIAR')
                                            ->orWhere('c.program','like','MAESTRÍA EN SALUD PÚBLICA');
                                    })->count();
        $B4A201 = DB::table('voters as v')
                                    ->join('censos as c','v.dni','=','c.dni')
            ->where(function($query){
                return $query->where('v.status','=',1)
                    ->orWhere('v.status','=',2)
                    ->orWhere('v.status','=',3)
                    ->orWhere('v.status','=',4)
                    ->orWhere('v.status','=',5)
                    ->orWhere('v.status','=',6)
                    ->orWhere('v.status','=',0)
                    ->orWhere('v.status','=',9);
            })
                                    ->where(function ($query){
                                        return $query->where('c.program','like','ZOOTECNIA')
                                            ->orWhere('c.program','like','TECNOLOGÍA PRODUCCIÓN AGROPECUARIA')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN NUTRICIÓN ANIMAL')
                                            ->orWhere('c.program','like','ESPECIALIZACIÓN PRODUCCIÓN ANIMAL TROPICAL (RUMIANTES)');
                                    })->count();
        $OutCounter = DB::table('voters as v')
            ->leftJoin('censos as c','v.dni','=','c.dni')
            ->whereNull('c.program')
            ->where(function($query){
                return $query->where('v.status','=',1)
                    ->orWhere('v.status','=',2)
                    ->orWhere('v.status','=',3)
                    ->orWhere('v.status','=',4)
                    ->orWhere('v.status','=',5)
                    ->orWhere('v.status','=',6)
                    ->orWhere('v.status','=',0)
                    ->orWhere('v.status','=',9);
            })->count();
        $TotalVotoLider = Voter::where('find','=',3)->count();
        $TotalVotoDiplomado = Voter::where('find','=',2)->count();
        return view('livewire.show-places',compact('B3A203','B2A104','B3A101','B4A102','B4A201','TotalVotoDiplomado','TotalVotoLider', 'OutCounter'));
    }
}
