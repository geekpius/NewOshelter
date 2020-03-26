<?php

use Faker\Generator as Faker;

$factory->define(App\PropertyModel\PropertyType::class, function (Faker $faker) {
    return [
        'name' => "hostel",
    ];
});
