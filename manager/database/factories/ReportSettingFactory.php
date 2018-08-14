<?php

$factory->define(App\ReportSetting::class, function (Faker\Generator $faker) {
    return [
        "millisecond_precision" => 1,
        "show_channel_button" => 1,
        "show_clip_button" => 1,
        "show_group_button" => 1,
        "show_live_button" => 1,
        "enable_evt" => 0,
        "enable_excel" => 0,
        "enable_evt_timing" => 0,
        "timezone" => $faker->name,
        "country_id" => factory('App\Country')->create(),
        "synce_server_id" => factory('App\SyncServer')->create(),
        "filters_id" => factory('App\Filter')->create(),
    ];
});
