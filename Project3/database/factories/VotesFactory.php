<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Vote;
use Faker\Generator as Faker;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'number_of_votes'=>$faker->randomNumber()
    ];
});
