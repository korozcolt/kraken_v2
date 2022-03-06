<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;

class BeasileUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/update_besaile.json');
        $voters = json_decode($json, true);
        $votante = new Voter01();

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                $votante = Voter01::where('dni',$value['dni'])->first();
                $votante->firstname = $value['firstname'];
                $votante->lastname = $value['lastname'];
                $votante->phone = $value['phone'];
                $votante->lider_dni = $value['lider_dni'];
                $votante->coordinator_dni = $value['coordinator_dni'];
                $votante->city_id = $value['city_id'];
                $votante->table = $value['table'];
                $votante->place = $value['place'];
                $votante->save();
            }
        }
    }
}
