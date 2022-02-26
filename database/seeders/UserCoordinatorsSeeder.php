<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use File;

class UserCoordinatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/user_coordinators.json');
        $users = json_decode($json, true);

        foreach ($users as $key => $value){
            User::create([
                'dni' => $value['dni'],
                'firstname' => $value['firstname'],
                'lastname' => $value['lastname'],
                'email' => $value['firstname'].$value['lastname'].'@gmail.com',
                'password' => \Hash::make('Mile101'),
                'role' => 'USER',
                'status' => 'ACTIVE',
            ]);
        }
    }
}
