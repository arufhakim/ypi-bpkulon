<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guru;
use Faker\Generator as Faker;

$factory->define(Guru::class, function (Faker $faker) {
   
    return [
        'jabatan_id' => $faker->numberBetween(1,6),
        'nama' => $faker->name,
        'nip' =>  $faker->unique()->numerify('###############'),
        'tempatLahir' => $faker->city,
        'tanggalLahir' => $faker->date,
        'jenisKelamin' =>  $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'noTelepon' => $faker->unique()->numerify('#############'),
        'alamat' => $faker->address,
        'created_at' => now(),
        'updated_at' => now()
    ];
});