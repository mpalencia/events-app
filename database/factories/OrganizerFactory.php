<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Organizer::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'description' => $faker->sentence,
        'address' => $faker->address,
        'contact' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret')
    ];
});
