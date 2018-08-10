<?php

$factory->define(App\Alert::class, function (Faker\Generator $faker) {
    return [
        'title'      => $faker->name,
        'content'    => $faker->name,
        'alert_type' => collect(['alert-danger', 'alert-info', 'alert-warning', 'alert-success', 'alert-default', 'alert-plain'])->random(),
        'contact_id' => factory('App\Contact')->create(),
        'user_id'    => factory('App\User')->create(),
    ];
});
