<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'user_id' => rand(1, 7),
        'category_id' => rand(1, 20),
        'name' => $title,
        'slug' => str_slug($title),
        'excerpt' => $faker->text(150),
        'body' => $faker->text(1000),
        'file' => $faker->imageUrl($width = 1200, $height = 400),
        'status' => $faker->randomElement(['DRAFT', 'PUBLISHED']),

    ];
});
