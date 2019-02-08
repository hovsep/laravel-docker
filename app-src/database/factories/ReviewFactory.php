<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Review::class, function (Faker $faker) {
    return [
        'title'                 => $faker->sentence,
        'user'                  => $faker->email,
        'culture'               => rand(0, 10),
        'management'            => rand(0, 10),
        'work_live_balance'     => rand(0, 10),
        'career_development'    => rand(0, 10),
        'pro'                   => $faker->text,
        'contra'                => $faker->text,
        'suggestions'           => $faker->text
    ];
});
