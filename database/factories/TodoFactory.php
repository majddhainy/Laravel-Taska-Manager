<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use Model u want 
use App\Todo;
use Faker\Generator as Faker;

// php artisan make:factory TodoFactory 
// define a factory give it (the model that interact with this table) then return what u want
// factory is to generate some random data inside a specific table 
// u need to create a seed to use the factory 

$factory->define(Todo::class, function (Faker $faker) {
    return [

        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(2),
        'completed' => false,

    ];
});
