<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
          'title' => $faker->realText(100),
          'img_url' => $faker->imageUrl(1080,720),
          'slug' =>$faker->slug,
          'body'=>$faker->paragraph,
          'views'=>$faker->numberBetween(200,1000),
          'tags'=>$faker->city,
          'published'=>$faker->boolean,
          'category_id'=>$faker->numberBetween(1,30),
          'user_id'=>$faker->numberBetween(1,10)
    ];
});
