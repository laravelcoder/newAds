<?php

$factory->define(App\Filter::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
