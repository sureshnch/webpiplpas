<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "remember_token" => $faker->name,
        "approved" => 0,
        "created_by_id" => factory('App\User')->create(),
    ];
});
