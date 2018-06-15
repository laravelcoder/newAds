<?php

$factory->define(App\Phone::class, function (Faker\Generator $faker) {
    return [
        "phone_number" => $faker->name,
        "advertiser_id" => factory('App\Contact')->create(),
        "agent_id" => factory('App\Agent')->create(),
        "advertisers_id" => factory('App\ContactCompany')->create(),
    ];
});
