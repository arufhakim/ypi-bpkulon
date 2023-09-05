<?php

use Illuminate\Database\Seeder;

class AnakAsuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\AnakAsuh::class, 30)->create();
    }
}
