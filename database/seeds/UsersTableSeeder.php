<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserProfile;
use App\Location;

include_once 'App\Helpers\MyFunctions.php';

class UsersTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('users')->delete();

        $users = factory(User::class, 10)->create();

        foreach($users as $user){
            UserProfile::create(
                array(
                    'user_id' => $user->id,
                    'date_of_birth' => date('Y-m-d', rand(0500000000,1000000000)),
                    'location_id' => Location::inRandomOrder()->first()->id,
                )
            );
        }
    }
}
