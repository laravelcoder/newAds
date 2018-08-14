<?php

$factory->define(App\Channel::class, function (Faker\Generator $faker) {
    return [
        "channelid" => $faker->name,
        "type" => collect(["prod","dev",])->random(),
    ];
});
