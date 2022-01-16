<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        City::truncate();

        $json = File::get('database/data/cities.json');
        $states = json_decode($json);

        foreach ($states as $key => $value){
            City::create([
                'id' => $value->id,
                'name' => $value->name,
                'state_id' => $value->state_id,
            ]);
        }
    }
}
