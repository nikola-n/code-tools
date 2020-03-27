<?php

/** @var Factory $factory */

use App\Course;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'type'=>$faker->randomElement(['free','paid']),
        'level'=>$faker->randomElement(['beginner','advanced']),
        'medium'=>$faker->randomElement(['book','video']),
        'votes'=>$faker->randomNumber(),
        'url'=>$faker->url,
        'approved'=>$faker->boolean,
        'user_id'=>factory(App\User::class)

    ];
});
