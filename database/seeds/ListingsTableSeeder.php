<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ListingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('listings')->delete();

        $listings = factory(App\Listing::class, 80)->create();
    }
}
