<?php

use Illuminate\Database\Seeder;

class PencatatanUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Pencatatan::class, 30)->create();
    }
}
