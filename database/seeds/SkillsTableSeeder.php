<?php

use Illuminate\Database\Seeder;

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

        $skills = array('Python', 'Java', 'C++', 'Ableton', 'Cubase', 'Adobe After Effects', 'Photoshop', 'SQL', 'Drums', 'Vocals', 'Violin', 'DJ', 'Mixing', 'Mastering');

        foreach($skills as $skill){
            DB::table('skills')->insert([
                'title' => $skill,
            ]);
        }
    }
}
