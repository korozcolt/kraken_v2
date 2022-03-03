<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class CoquitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/coquitos.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => $value['firstname'],
                    'lastname' => $value['lastname'],
                    'phone' => $value['phone'],
                    'address' => 'SINCELEJO',
                    'table' => $value['table'],
                    'place' => $value['place'],
                    'lider_dni' => $value['lider_dni'],
                    'coordinator_dni' => $value['coordinator_dni'],
                    'gender' => 'NONE',
                    'status' => 'BESAILE',
                    'city_id' => $value['city_id'],
                ]);
            }
        }
    }
}
