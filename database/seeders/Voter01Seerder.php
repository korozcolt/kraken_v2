<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter01;
use File;

class Voter01Seerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/voters-01.json');
        $voters = json_decode($json, true);

        foreach ($voters as $key => $value){
            if(Voter01::where('dni', $value['dni'])->count() == 0){
                Voter01::create([
                    'dni' => $value['dni'],
                    'firstname' => strtoupper($value['firstname']),
                    'lastname' => strtoupper($value['lastname']),
                    'phone' => $value['phone'],
                    'address' => strtoupper($value['address1']. ' ' . $value['address2']),
                    'lider_dni' => $value['lider'],
                    'coordinator_dni' => $value['coordinator'],
                    'gender' => 'NONE',
                    'status' => 'CARDENAS'
                ]);
            }
        }
    }
}
