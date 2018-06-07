<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Ticket::class, function (Faker $faker) {
    $seat = ["General Admission", "Upper Box A", "Upper Box B", "Lower Box A", "Lower Box B",
        "Premium Bench - VIP", "Premium Box", "Patron A", "Patron B", "Patron C"];
    return [
        'user_id' => function () {
            return factory(App\Model\User::class)->create()->id;
        },
        'event_id' => function () {
            return factory(App\Model\Event::class)->create()->id;
        },
        'order_number' => $faker->unique()->isbn13,
        'description' => $faker->sentence,
        'seat' => $seat[mt_rand(0, (count($seat) - 1))],
        'attended' => rand(0,1)
    ];
});
