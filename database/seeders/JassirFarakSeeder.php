<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class JassirFarakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/jassir_farak.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => $value['fisrtname'],
                    'lastname' => $value['lastname'],
                    'phone' => 0,
                    'address' => 'SINCELEJO',
                    'place' => $value['place'],
                    'table' => $value['table'],
                    'lider_dni' => $value['lider_dni'],
                    'coordinator_dni' => $value['coordinator_dni'],
                    'gender' => 'NONE',
                    'status' => 'ACTIVE',
                    'city_id' => '',
                ]);
            }
        }
    }
}
