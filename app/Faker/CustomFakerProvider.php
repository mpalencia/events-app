<?php

namespace App\Faker;

use App\Faker\Provider\Event;
use Faker\Generator;

class CustomFakerProvider
{
    public static function addAllProviders(Generator $faker){
        $faker->addProvider(new Event($faker));
        return $faker;
    }
}