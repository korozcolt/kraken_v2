<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class VoterJeffesonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/jefferson.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => '',
                    'lastname' => '',
                    'phone' => 0,
                    'address' => 'SINCELEJO',
                    'lider_dni' => 0,
                    'coordinator_dni' => 92555601,
                    'gender' => 'NONE',
                    'status' => 'ACTIVE',
                    'city_id' => '70001',
                ]);
            }
        }
    }
}
