<?php

$factory->define(App\PerChannelConfiguration::class, function (Faker\Generator $faker) {
    return [
        "cid" => $faker->name,
        "active" => 1,
        "notify_channel_id" => $faker->name,
        "offset" => $faker->name,
        "ad_lengths" => $faker->randomNumber(2),
        "ad_spacing" => $faker->name,
        "rtn_id" => factory('App\RealtimeNotification')->create(),
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
