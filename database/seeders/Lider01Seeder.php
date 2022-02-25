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
        $json = File::get('database/data/leaders_final.json');
        $liders = json_decode($json, true);

        foreach ($liders as $key => $value){
            $coordinator = Coordinator::where('dni',$value['coordinator_dni'])->first();
            Lider::create([
                'dni' => $value['dni'],
                'firstname' => strtoupper($value['firstname']),
                'lastname' => strtoupper($value['lastname']),
                'phone' => $value['phone'],
                'address' => 'SINCELEJO',
                'coordinator_id' => $coordinator->id,
                'city_id' => 70001,
                'user_id' => $coordinator->user_id,
            ]);
        }
    }
}
