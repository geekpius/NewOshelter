<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    $membership = gmdate('ymdHis');
    return [
        'membership' => $membership,
        'name' => "Fiifi Pius",
        'email' => 'fiifipius@gmail.com',
        'password' => \Hash::make('aaaaaa'), // secret
        'phone' => '0542398441',
        'digital_address' => 'GL-050-6970',
        'role' => 'landlord',
    ];
});
