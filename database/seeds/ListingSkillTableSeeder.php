<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
include_once 'App\Helpers\MyFunctions.php';

class ListingSkillTableSeeder extends Seeder
{
    public function run()
    {
        $listings = App\Listing::orderBy('id')->get();
        $skills = App\Skill::orderBy('id')->get();

        $entries = random_id_pairs($listings, $skills);

        foreach($entries as $entry){
        	DB::table('listing_skill')->insert(
        		['listing_id' => $entry[0], 'skill_id' => $entry[1]]
        	);
        }        
    }
}