<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supervisor;
use App\Models\User;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supervisor::truncate();
        $user = User::where('dni','1102812122')->first();
        Supervisor::create([
            'dni' => '1102812122',
            'firstname' => 'KRISTIAN',
            'lastname' => 'OROZCO',
            'phone' => '3016859339',
            'phone_two' => '3016859339',
            'address' => 'CALLE 23 #13C 96 APTO 201',
            'birthdate' => '1987-09-18',
            'email' => 'ing.korozco@gmail.com',
            'gender' => 'MALE',
            'city_id' => 70001,
            'user_id' => $user->id,
        ]);
    }
}
