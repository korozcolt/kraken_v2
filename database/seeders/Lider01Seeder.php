<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coordinator;
use App\Models\Lider;
use File;

class Lider01Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/liders_01.json');
        $liders = json_decode($json, true);

        foreach ($liders as $key => $value){
            $coordinator = Coordinator::where('dni',$value['COORDINATOR'])->first();
            Lider::create([
                'dni' => $value['DNI'],
                'firstname' => strtoupper($value['FIRSTNAME']),
                'lastname' => strtoupper($value['LASTNAME']),
                'phone' => $value['PHONE'],
                'address' => strtoupper($value['ADDRESS1']. ' ' . $value['ADDRESS2']),
                'coordinator_id' => $coordinator->id,
                'city_id' => 70001,
                'user_id' => $coordinator->user_id,
            ]);
        }
    }
}
