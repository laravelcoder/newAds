<?php

$factory->define(App\Cso::class, function (Faker\Generator $faker) {
    return [
        "channel_server_id" => factory('App\ChannelServer')->create(),
        "cid_id" => factory('App\Channel')->create(),
        "ocloud_a" => $faker->name,
        "ocp_a" => $faker->randomNumber(2),
        "ocloud_b" => $faker->name,
        "ocp_b" => $faker->name,
    ];
});
