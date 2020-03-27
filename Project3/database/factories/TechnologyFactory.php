<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Technology;
use Faker\Generator as Faker;

$factory->define(Technology::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'img'=>$faker->imageUrl(),
        'category_id'=>factory(App\Category::class),

    ];
});
