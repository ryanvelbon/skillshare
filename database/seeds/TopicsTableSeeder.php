<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->delete();

        $topics = array('Animation', 'Video Editing', 'Music Production', 'Guitar', 'Graphic Design');

        foreach($topics as $topic){
            DB::table('topics')->insert([
                'title' => $topic,
            ]);
        }
    }
}
