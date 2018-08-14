<?php

$factory->define(App\GeneralSetting::class, function (Faker\Generator $faker) {
    return [
        "transcoding_server" => $faker->name,
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
