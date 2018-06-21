<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'position' => $faker->jobTitle,
        'gender' => random_int(0, 1),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'avatar' => random_int(1, 20) . '.jpg',
        'cover' => 'placeholder.png',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'phone_number' => $faker->phoneNumber,
        'about' => $faker->paragraph,
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
    ];
});

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph
    ];
});

$factory->define(App\GroupUser::class, function (Faker $faker) {
    return [
        'group_id' => function () {
            return factory('App\Group')->create()->id;
        },
        'user_id' => random_int(0, 100),
//        'user_id' => function() {
//            return factory('App\User')->create()->id;
//        },
        'role' => $faker->randomElement(['admin', 'moderator', 'member'])
    ];
});
