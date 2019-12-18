<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
      'jobTitle' => $faker->jobTitle,
      'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'user_id' =>rand(1,App\User::count()),
    ];
});
