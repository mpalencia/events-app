<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'organizer_id' => function () {
            return factory(App\Model\Organizer::class)->create()->id;
        },
        'tag_id' => function () {
            $tags = new \App\Model\Tag;
            return $tags->inRandomOrder()->first()->id;
        }
    ];
});
