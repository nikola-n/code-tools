<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'description'=>$faker->text(),
        'type'=>$faker->randomElement(['free','paid']),
        'popular'=>$faker->boolean(50),
        'user_id'=>factory(App\User::class),
    ];
});
