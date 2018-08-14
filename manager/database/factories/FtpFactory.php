<?php

$factory->define(App\Ftp::class, function (Faker\Generator $faker) {
    return [
        "ftp_server" => $faker->name,
        "ftp_directory" => $faker->name,
        "ftp_username" => $faker->name,
        "ftp_password" => str_random(10),
        "grab_time" => $faker->date("H:i:s", $max = 'now'),
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
