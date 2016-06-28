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
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'enabled' => 0,
        'rol' => 0,
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'phone' => $faker->phoneNumber
    ];
});

$factory->define(App\Court::class, function (Faker\Generator $faker) {
    return [
        'active' => $faker->boolean(75)
    ];
});

$factory->define(App\CourtUser::class, function (Faker\Generator $faker) {
    return [
        'reservation_date' => $faker->dateTime,
        'users_id' => '6',
        'courts_id' => '2',
        '2nd_player' => $faker->firstName,
        '3rd_player' => $faker->firstName,
        '4th_player' => $faker->firstName,
    ];
});


