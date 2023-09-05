<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Pencatatan;
use Faker\Generator as Faker;

$factory->define(Pencatatan::class, function (Faker $faker) {
    return [
        //Umum
        'saldo_id' => $faker->numberBetween(1,3),
        'kategori_id' => $faker->numberBetween(1,6),
        'namaPencatatan' => 'Pencatatan Umum',
        'tanggalPencatatan' => $faker->date,
        'jenisPencatatan' => $faker->randomElement(['Pemasukan', 'Pengeluaran']),
        'jumlah' => $faker->numberBetween(100000, 500000),
        'keterangan' => '',
        'oleh' => App\User::inRandomOrder()->first()->name,

        //Gaji
        // 'saldo_id' => 2,
        // 'kategori_id' => 1,
        // 'guru_id' => $faker->numberBetween(2,50),
        // 'namaPencatatan' => 'Pencatatan Pembayaran Gaji',
        // 'tanggalPencatatan' => $faker->date,
        // 'jenisPencatatan' => 'Pengeluaran',
        // 'jumlah' => $faker->numberBetween(100000, 500000),
        // 'keterangan' => '',
        // 'oleh' => App\User::inRandomOrder()->first()->name,

        //SPP
        // 'saldo_id' => 2,
        // 'kategori_id' => 2,
        // 'santri_id' => $faker->numberBetween(2,30),
        // 'namaPencatatan' => 'Pencatatan Pembayaran SPP',
        // 'tanggalPencatatan' => $faker->date,
        // 'jenisPencatatan' => 'Pemasukan',
        // 'jumlah' => 25000,
        // 'keterangan' => '',
        // 'oleh' => App\User::inRandomOrder()->first()->name,

        // //Donasi
        // 'saldo_id' => 3,
        // 'kategori_id' => 3,
        // 'donatur_id' => $faker->numberBetween(2, 30),
        // 'namaPencatatan' => 'Pencatatan Donasi',
        // 'tanggalPencatatan' => $faker->date,
        // 'jenisPencatatan' => 'Pemasukan',
        // 'jumlah' => $faker->numberBetween(100000, 500000),
        // 'keterangan' => '',
        // 'oleh' => App\User::inRandomOrder()->first()->name,

        // //Bantuan
        // 'saldo_id' => 3,
        // 'kategori_id' => 5,
        // 'anakasuh_id' => $faker->numberBetween(2, 30),
        // 'namaPencatatan' => 'Pencatatan Bantuan',
        // 'tanggalPencatatan' => $faker->date,
        // 'jenisPencatatan' => 'Pengeluaran',
        // 'jumlah' => $faker->numberBetween(100000, 500000),
        // 'keterangan' => '',
        // 'oleh' => App\User::inRandomOrder()->first()->name,
    ];
});
