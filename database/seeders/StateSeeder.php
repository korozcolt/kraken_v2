<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use File;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();

        $json = File::get('database/data/states.json');
        $states = json_decode($json);

        foreach ($states as $key => $value){
            State::create([
                'id' => $value->id,
                'name' => $value->name,
            ]);
        }
    }
}
