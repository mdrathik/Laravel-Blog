<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->colorName,
        'slug' => $faker->slug(2),
    ];
});
