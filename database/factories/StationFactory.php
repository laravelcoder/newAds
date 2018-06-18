<?php

$factory->define(App\Station::class, function (Faker\Generator $faker) {
    return [
        "station_label" => $faker->name,
        "channel_number" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
