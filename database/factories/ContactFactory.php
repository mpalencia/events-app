<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Contact::class, function (Faker $faker) {
    return [
        'event_id' => function () {
            return factory(App\Model\Event::class)->create()->id;
        },
        'contacts' => $faker->name . ' (' . $faker->phoneNumber . ')'
    ];
});
