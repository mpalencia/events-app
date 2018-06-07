<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\EventTag::class, function (Faker $faker) {
    return [
        'event_id' => function (){
            return factory(\App\Model\Event::class)->create()->id;
        },
        'tag_id' => function (){
            $tags = new \App\Model\Tag;
            return $tags->inRandomOrder()->first()->id;
        }
    ];
});
