<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class VoterNicolasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/nicolas_sierra.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => '',
                    'lastname' => '',
                    'phone' => 0,
                    'address' => 'SINCELEJO',
                    'lider_dni' => 73122790,
                    'coordinator_dni' => 73122790,
                    'gender' => 'NONE',
                    'status' => 'ACTIVE',
                    'city_id' => '70001',
                ]);
            }
        }
    }
}
