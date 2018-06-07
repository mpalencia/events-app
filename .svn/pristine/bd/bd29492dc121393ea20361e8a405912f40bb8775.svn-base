<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Location::class, function (Faker $faker) {
    return [
        'event_id' => function (array $post) {
            return factory(App\Model\Event::class)->create()->id;
        },
        'name' => $faker->city,
        'address' => $faker->address,
        'lat' => (mt_rand(1, 9999999) / 100000),
        'lng' => (mt_rand(1, 9999999) / 100000)
    ];
});
