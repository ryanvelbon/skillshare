<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
	return [
		'city' => $faker->city,
		'state' => $faker->state,
		'zip' => $faker->postcode,
	];
});

$factory->define(App\Listing::class, function (Faker\Generator $faker) {
	return [
		'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 50, $variableNbWords = true),
        'paid' => rand(0,1) == 1,
        'user_id' => App\User::inRandomOrder()->first()->id,
        'craft_id' => App\Craft::inRandomOrder()->first()->id,
        'location_id' => App\Location::inRandomOrder()->first()->id,
	];
});