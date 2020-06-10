<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $membership = gmdate('ymdHis');
    return [
        'membership' => $membership,
        'name' => "Fiifi Pius",
        'email' => 'fiifipius@gmail.com',
        'password' => \Hash::make('aaaaaa'), // secret
        'phone' => '0542398441',
        'digital_address' => 'GL-050-6970',
    ];
});
