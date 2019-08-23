<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mission;
use Faker\Generator as Faker;

$factory->define(Mission::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
    ];
});
