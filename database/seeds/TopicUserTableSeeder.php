<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
include_once 'App\Helpers\MyFunctions.php';

class TopicUserTableSeeder extends Seeder
{
    public function run()
    {
        $topics = App\Topic::all();
        $users = App\User::all();

        $entries = random_id_pairs($topics, $users);

        foreach($entries as $entry){
        	DB::table('topic_user')->insert(
        		['topic_id' => $entry[0], 'user_id' => $entry[1]]
        	);
        }        
    }
}