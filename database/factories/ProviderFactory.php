<?php

$factory->define(App\Provider::class, function (Faker\Generator $faker) {
    return [
        'provider' => $faker->name,
    ];
});
