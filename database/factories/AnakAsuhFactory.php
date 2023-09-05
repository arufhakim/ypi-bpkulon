<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnakAsuh;
use Faker\Generator as Faker;

$factory->define(AnakAsuh::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'bantuan' =>  $faker->numberBetween(100000, 500000),
        'tempatLahir' => $faker->city,
        'tanggalLahir' => $faker->date,
        'jenisKelamin' =>  $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'noTeleponOrtu' => $faker->unique()->numerify('#############'),
        'alamat' => $faker->address,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
