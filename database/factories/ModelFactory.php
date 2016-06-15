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


