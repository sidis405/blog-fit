<?php

use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->word,
        'slug' => Str::slug($name),
    ];
});
