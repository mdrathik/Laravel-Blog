<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment'=>$faker->sentence(8),
        'post_id'=>$faker->numberBetween(1,211),
        'user_id'=>$faker->numberBetween(1,10)
    ];
});
