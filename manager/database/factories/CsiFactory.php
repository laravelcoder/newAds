<?php

$factory->define(App\Csi::class, function (Faker\Generator $faker) {
    return [
        "channel_server_id" => factory('App\ChannelServer')->create(),
        "channel_id" => factory('App\Channel')->create(),
        "protocol_id" => factory('App\Protocol')->create(),
        "ssm" => $faker->name,
        "imc" => $faker->name,
        "ip" => $faker->name,
        "pid" => $faker->name,
    ];
});
