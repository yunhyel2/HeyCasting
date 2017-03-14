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

$factory->define(App\Community::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $community_id_min = App\Community::all()->min()->id;
    $community_id_max = App\Community::all()->max()->id;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'address' => $faker->address,

        'community_id' => $faker->numberBetween($community_id_min, $community_id_max),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $user_id_min = App\User::all()->min()->id;
    $user_id_max = App\User::all()->max()->id;
    $community_id_min = App\Community::all()->min()->id;
    $community_id_max = App\Community::all()->max()->id;
    return [
        'text' => $faker->text,
        'user_id' => $faker->numberBetween($user_id_min, $user_id_max),
        'community_id' => $faker->numberBetween($community_id_min, $community_id_max),
    ];
});
