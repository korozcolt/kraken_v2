<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Censo;
use File;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Censo::truncate();

        $json = File::get('database/data/puestos.json');
        $states = json_decode($json);

        foreach ($states as $key => $value){
            Censo::create([
                'place' => $value->place,
            ]);
        }
    }
}
