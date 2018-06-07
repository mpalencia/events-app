<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Timestamp::class, function (Faker $faker) {
    $date = date('Y-m-d H:i:s');
    $days = [" + 1 days", " + 2 days", " + 3 days", " + 4 days", " + 5 days"];
    $timestamp_start = date('Y-m-d H:i:s', strtotime($date. $days[rand(0,4)]));
    return [
        'event_id' => function () {
            return factory(App\Model\Event::class)->create()->id;
        },
        'timestamp_start' => $timestamp_start,
        "timestamp_end" => date('Y-m-d H:i:s', strtotime($timestamp_start . $days[rand(0,4)]))
    ];
});
