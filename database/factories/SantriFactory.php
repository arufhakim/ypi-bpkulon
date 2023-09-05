<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Santri;
use Faker\Generator as Faker;

$factory->define(Santri::class, function (Faker $faker) {
    return [
        'jenjang_id' => $faker->numberBetween(1,7),
        'nama' => $faker->name,
        'nis' =>  $faker->unique()->numerify('###############'),
        'spp' => 25000,
        'tempatLahir' => $faker->city,
        'tanggalLahir' => $faker->date,
        'jenisKelamin' =>  $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'noTeleponOrtu' => $faker->unique()->numerify('#############'),
        'alamat' => $faker->address,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
