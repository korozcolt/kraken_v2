<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class LastUploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/last_upload.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni',$value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => '',
                    'lastname' => '',
                    'phone' => 0,
                    'address' => 'SINCELEJO',
                    'place' => $value['place'],
                    'table' => $value['table'],
                    'lider_dni' => 0,
                    'coordinator_dni' => 0,
                    'gender' => 'NONE',
                    'status' => $value['status'],
                    'city_id' => '',
                ]);
            }
        }
    }
}
