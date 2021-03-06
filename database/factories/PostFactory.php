<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [

      'post'=>$faker->realText($maxNbChars = 200, $indexSize = 2),
      'image'=>$faker->imageUrl($width = 640, $height = 480),
      'user_id'=>rand(1,App\User::count()),
    ];
});
