<?php

$factory->define(App\OutputSetting::class, function (Faker\Generator $faker) {
    return [
        "report_time" => $faker->date("H:i:s", $max = 'now'),
        "email_id" => factory('App\User')->create(),
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
