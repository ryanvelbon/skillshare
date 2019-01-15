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
    }
}
