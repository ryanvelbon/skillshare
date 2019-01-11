<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();

        $skills = array('Animation', 'Video Editing', 'Music Production', 'Guitar', 'Graphic Design');

        foreach($skills as $skill){
            DB::table('skills')->insert([
                'title' => $skill,
            ]);
        }
    }
}
