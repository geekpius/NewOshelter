<?php

use Faker\Generator as Faker;

$factory->define(App\AdminModel\Amenity::class, function (Faker $faker) {
    return [
        'name' => "TV",
    ];
});
