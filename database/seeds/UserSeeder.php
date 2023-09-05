<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Linda Abdul Harris',
            'username' => 'ketua',
            'role' => 'ketua',
            'password' => Hash::make('aa'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Mia Sucipto',
            'username' => 'bendumum',
            'role' => 'bendumum',
            'password' => Hash::make('aa'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Aunur Rofiq',
            'username' => 'bendpendidikan',
            'role' => 'bendpendidikan',
            'password' => Hash::make('aa'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Lilik Faridah Hanum',
            'username' => 'bendanakasuh',
            'role' => 'bendanakasuh',
            'password' => Hash::make('aa'),
            'remember_token' => Str::random(10)
        ]);
    }
}
