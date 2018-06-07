<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Event::class, function (Faker $faker) {
    $status = ['O', 'L', 'D'];
    return [
        'organizer_id' => function (){
            return factory(App\Model\Organizer::class)->create()->id;
        },
        'name' => $faker->unique()->eventTitle,
        'description' => $faker->eventDescription,
        'image' => $faker->unique()->eventImage,
        'price' => mt_rand(500, 9999),
        'ticket_max'=> mt_rand(100, 999),
        'status' => $status[rand(0, 2)]
    ];
});
