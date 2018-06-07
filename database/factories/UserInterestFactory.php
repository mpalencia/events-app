<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\UserInterest::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Model\User::class)->create()->id;
        },
        'tag_id' => function () {
            $tags = new \App\Model\Tag;
            return $tags->inRandomOrder()->first()->id;
        }
    ];
});
