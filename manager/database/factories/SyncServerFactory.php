<?php

$factory->define(App\SyncServer::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
