<?php

$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
