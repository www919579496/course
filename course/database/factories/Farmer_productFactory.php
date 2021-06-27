<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Farmer_product::class, function (Faker $faker) {
    return [
        'farmer_id' =>$faker->randomDigit(3, 6),
        'name' => $faker->sentence(mt_rand(3, 10)),
        'age' => $faker->randomDigit(3, 6),
        'origin' => $faker->sentence(mt_rand(6,12)),
        'producer'=> $faker->sentence(mt_rand(1,3)),
        'public_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'ractopamine' => $faker->sentence(mt_rand(3, 10))
    ];
});
