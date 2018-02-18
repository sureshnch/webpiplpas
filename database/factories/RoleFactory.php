<?php

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
