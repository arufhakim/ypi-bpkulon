<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Donatur;
use Faker\Generator as Faker;

$factory->define(Donatur::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'donasi' => $faker->numberBetween(10000, 500000),
        'jenisKelamin' =>  $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'noTelepon' => $faker->unique()->numerify('#############'),
        'alamat' => $faker->address,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
