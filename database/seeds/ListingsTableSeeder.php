<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listings')->delete();

        $listings = factory(App\Listing::class, 10)->create();

        // Seed 'listing_topic' table

        $all_topic_ids = App\Topic::all()->pluck('id')->toArray();


        // echo App\Topic::find($all_topic_ids[0]);


        foreach($listings as $listing){
            
            $subset = array_rand($all_topic_ids, rand(2,5));
            // BUG IS HERE! array_rand retrieves random "keys" not random "values". We want the fucking values.
            
            echo var_dump($subset);
            echo gettype($subset);

            foreach($subset as $topic_id){
                $listing->topics()->attach($topic_id);
            }
        }
    }
}
