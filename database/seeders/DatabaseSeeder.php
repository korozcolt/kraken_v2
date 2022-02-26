<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // StateSeeder::class,
            // CitySeeder::class,
            // UserSeeder::class,
            // SupervisorSeeder::class,
            // CoordinatorSeeder::class,
            // Lider01Seeder::class,
            // Voter01Seerder::class,
            // Voter02Seerder::class,
            // Voter11Seerder::class,
            // Voter21Seerder::class,
            // Voter03Seerder::class,
            // Voter04Seeder::class,
            UserCoordinatorsSeeder::class,
        ]);
    }
}
