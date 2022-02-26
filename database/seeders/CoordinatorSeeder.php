<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coordinator;
use App\Models\Supervisor;
use File;

class CoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coordinator::truncate();

        $json = File::get('database/data/coordinadores_final.json');
        $coordinators = json_decode($json);
        $supervisor = Supervisor::where('dni','1102812122')->first();

        foreach ($coordinators as $key => $value){
            Coordinator::create([
                'dni' => $value->dni,
                'firstname' => strtoupper($value->firstname),
                'lastname' => strtoupper($value->lastname),
                'phone' => $value->phone,
                'phone_two' => 0,
                'address' => 'SINCELEJO',
                'birthdate' => '1990-01-01',
                'supervisor_id' => $supervisor->id,
                'city_id' => 70001,
                'user_id' => $supervisor->user_id,
            ]);
        }
    }
}
