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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'address' => $faker->address,
    ];
});

$factory->define(App\Enter::class, function (Faker\Generator $faker) {

    return [
        'id' => 0,
        'flag' => 0,
        'link' => 0,
        'email' => 0,
        'password' => 0,
        'name' => 0,
        'nickname' => 0,
        'nation' => 0,
        'gukgi' => 0,
        'code' => 0,
        'phone' => 0,
        'image' => 0,
    ];
});

