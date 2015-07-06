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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Entry::class, function ($faker) {
    return [
        'reason' => $faker->sentence($nbWords = 6),  // 'Sit vitae voluptas sint non voluptates.',
        'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 10000),
        'paid' => $faker->boolean(),
        'user_id'=> 1,
        'created_at' =>  $faker->dateTimeThisYear($max = 'now'),
        'updated_at' =>  $faker->dateTimeThisYear($max = 'now')
    ];
});