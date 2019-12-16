<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [

      'comment'=>$faker->realText($maxNbChars = 200, $indexSize = 2),
      'user_id'=>rand(1,App\User::count()),
      'post_id'=>rand(1,App\Post::count()),

    ];
});
