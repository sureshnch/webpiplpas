<?php

$factory->define(App\Requirement::class, function (Faker\Generator $faker) {
    return [
        "customer_name" => collect(["Please Select",])->random(),
        "job_id" => $faker->randomNumber(2),
        "job_title" => $faker->name,
        "job_type" => collect(["Please Select",])->random(),
        "description" => $faker->name,
        "location" => collect(["Please Select",])->random(),
        "department" => collect(["Please Select",])->random(),
        "industry" => collect(["Please Select",])->random(),
        "job_function" => collect(["Please Select",])->random(),
        "closing_date" => $faker->date("Y-m-d", $max = 'now'),
        "positions" => $faker->randomNumber(2),
        "skills" => $faker->name,
        "experience_from_years" => collect(["Please Select",])->random(),
        "experience_from_months" => collect(["Please Select",])->random(),
        "experience_to_years" => collect(["Please Select",])->random(),
        "experience_to_months" => collect(["Please Select",])->random(),
        "salary_range" => collect(["Please Select",])->random(),
        "availabity" => collect(["Please Select",])->random(),
        "referal_fee" => $faker->randomNumber(2),
        "point_of_contact" => $faker->name,
        "email" => $faker->safeEmail,
        "code" => $faker->randomFloat(2, 1, 100),
        "phone_number" => $faker->randomNumber(2),
        "skype_id" => $faker->name,
        "comment_box" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
