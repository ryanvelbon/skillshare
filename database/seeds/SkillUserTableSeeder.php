<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
include_once 'App\Helpers\MyFunctions.php';

class SkillUserTableSeeder extends Seeder
{
    public function run()
    {
        $skills = App\Skill::orderBy('id')->get();
        $users = App\User::orderBy('id')->get();

        $entries = random_id_pairs($users, $skills);

        foreach($entries as $entry){
        	DB::table('skill_user')->insert(
        		['user_id' => $entry[0], 'skill_id' => $entry[1]]
        	);
        }        
    }
}