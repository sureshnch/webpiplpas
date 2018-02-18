<?php

$factory->define(App\Resume::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "email" => $faker->safeEmail,
        "code" => $faker->randomFloat(2, 1, 100),
        "mobile_number" => $faker->randomNumber(2),
        "pancard" => $faker->name,
        "address" => $faker->name,
        "city" => $faker->name,
        "state" => $faker->name,
        "country" => $faker->name,
        "educational_qualification" => $faker->name,
        "primary_skills" => collect(["Please Select",])->random(),
        "sub_skills" => $faker->name,
        "work_experience_years" => collect(["Please Select",])->random(),
        "work_experience_months" => collect(["Please Select",])->random(),
        "relevant_experience" => $faker->name,
        "notice_period" => $faker->name,
        "prefered_location" => $faker->name,
        "current_ctc_lacks" => collect(["Please Select",])->random(),
        "current_ctc_thousands" => collect(["Please Select",])->random(),
        "expected_ctc_lacks" => collect(["Please Select",])->random(),
        "expected_ctc_thousands" => collect(["Please Select",])->random(),
        "comment_box" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
