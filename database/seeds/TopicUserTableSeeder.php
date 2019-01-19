<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
include_once 'App\Helpers\MyFunctions.php';

class TopicUserTableSeeder extends Seeder
{
    public function run()
    {
        $topics = App\Topic::orderBy('id')->get();
        $users = App\User::orderBy('id')->get();

        $entries = random_id_pairs($users, $topics);

        foreach($entries as $entry){
        	DB::table('topic_user')->insert(
        		['user_id' => $entry[0], 'topic_id' => $entry[1]]
        	);
        }        
    }
}