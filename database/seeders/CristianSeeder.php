<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class CristianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/cristian.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => $value['firstname'],
                    'lastname' => $value['lastname'],
                    'phone' => 0,
                    'address' => 'SINCELEJO',
                    'table' => $value['table'],
                    'place' => $value['place'],
                    'lider_dni' => $value['lider_dni'],
                    'coordinator_dni' => $value['coordinator_dni'],
                    'gender' => 'NONE',
                    'status' => 'APOLINAR',
                    'city_id' => $value['city_id'],
                ]);
            }
        }
    }
}
