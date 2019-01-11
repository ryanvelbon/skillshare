<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

	/*
	 * RUN THE FOLLOWING COMMANDS:
	 * $ composer dump-autoload
	 * $ db:seed
	 */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(LocationsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(ListingsTableSeeder::class);

        Model::reguard();
    }
}
