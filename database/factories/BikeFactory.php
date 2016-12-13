<?php

$factory->define(App\Bike::class, function (Faker\Generator $faker) {

    // TODO: Read Min & Max from config file.
    return [
//        'id' => $faker->randomDigit,
        'model' => $faker->name,//Yahama
        'make' => $faker->company,//
        'color' => $faker->rgbCssColor,//
        'cc' => $faker->numberBetween($min = 1, $max = 20000),
        'weight' => $faker->numberBetween($min = 50, $max = 30000),
        'price' => $faker->randomFloat(2 , 100,100000) ,//22.32
        'image' => $faker->imageUrl( 300,  271) ,//22.32
//        'created_at' => $faker->dateTime->format( 'Y-m-d H:i:s') ,
//        'created_at' => $faker->date( ) ,


    ];
});
