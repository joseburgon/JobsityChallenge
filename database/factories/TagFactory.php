<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word(4);
    return [
        'name' => $title, // Uno dos
        'slug' => str_slug($title), // uno-dos

    ];
});
