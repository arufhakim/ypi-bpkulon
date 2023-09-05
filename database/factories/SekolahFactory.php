<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Sekolah;
use Faker\Generator as Faker;

$factory->define(Sekolah::class, function (Faker $faker) {
    return [
        'anakasuh_id' => App\AnakAsuh::inRandomOrder()->first()->id,
        'jenjangSekolah' => $faker->randomElement(['SD/MI', 'SMP/MTs', 'SMA/MA', 'SMK/MAK']),
        'namaSekolah' => 'Sekolah Negeri 1 Gresik',
        'kelas' =>  $faker->randomElement(['1', '2', '3', '4', '5', '6']),
        'sppSekolah' => $faker->numberBetween(25000, 100000),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
