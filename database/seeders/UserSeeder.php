<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni' => '1102812122',
            'firstname' => 'KRISTIAN',
            'lastname' => 'OROZCO',
            'email' => 'ing.korozco@gmail.com',
            'password' => \Hash::make('Q@10op29+'),
            'role' => 'SUPERADMIN',
            'status' => 'ACTIVE',
        ]);
    }
}
