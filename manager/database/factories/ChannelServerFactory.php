<?php

$factory->define(App\ChannelServer::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
