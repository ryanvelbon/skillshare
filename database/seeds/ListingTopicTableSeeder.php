<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
include_once 'App\Helpers\MyFunctions.php';

class ListingTopicTableSeeder extends Seeder
{
    public function run()
    {
        $listings = App\Listing::orderBy('id')->get();
        $topics = App\Topic::orderBy('id')->get();

        $entries = random_id_pairs($listings, $topics);

        foreach($entries as $entry){
        	DB::table('listing_topic')->insert(
        		['listing_id' => $entry[0], 'topic_id' => $entry[1]]
        	);
        }        
    }
}