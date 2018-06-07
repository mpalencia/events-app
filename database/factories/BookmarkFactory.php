<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Bookmark::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(\App\Model\User::class)->create()->id;
        },
        'event_id' => function () {
            return factory(\App\Model\Event::class)->create()->id;
        }
    ];
});
