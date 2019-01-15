<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
include_once 'App\Helpers\MyFunctions.php';

class SkillUserTableSeeder extends Seeder
{
    public function run()
    {
        $skills = App\Skill::all();
        $users = App\User::all();

        $entries = random_id_pairs($skills, $users);

        foreach($entries as $entry){
        	DB::table('skill_user')->insert(
        		['skill_id' => $entry[0], 'user_id' => $entry[1]]
        	);
        }        
    }
}