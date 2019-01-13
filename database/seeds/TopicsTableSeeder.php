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

        $topics = array('Economics', 'Social Darwinism', 'Libertarianism', 'MAGA', 'MGTOW', 'Jordan Peterson', 'Ben Shapiro', 'Fascism', 'Fascwave', 'Julius Evola', 'AnCap', 'Survival of the Fittest');

        foreach($topics as $topic){
            DB::table('topics')->insert([
                'title' => $topic,
            ]);
        }
    }
}
