<?php

$factory->define(App\RealtimeNotification::class, function (Faker\Generator $faker) {
    return [
        "server_type" => collect(["NONE","CAIPY","IMAGINE","HARMONIC","ENVIVIO","OCTOSHAPE","MOVE",])->random(),
        "r_urltn" => $faker->name,
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
