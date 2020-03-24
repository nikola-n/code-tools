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
        'votes'=>$faker->randomNumber(50),
        'user_id'=>factory(App\User::class),
        'category_id'=>factory(App\Category::class),
        'languages_id'=>\factory(App\Language::class),
    ];
});
