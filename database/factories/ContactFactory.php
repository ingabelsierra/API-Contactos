<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'nombres' => $faker->name,
        'apellidos' => $faker->lastname,
        'direccion' => $faker->address,
        'telefono' => $faker->name,
       
    ];
});
