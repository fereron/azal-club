<?php

use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => function () {
            return factory('App\User')->create()->id;
        }
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'thread_id' => function() {
            return factory('App\Thread')->create()->id;
        },
        'user_id' => function() {
            return factory('App\Thread')->create()->id;
        },
        'body' => $faker->text
    ];
});


