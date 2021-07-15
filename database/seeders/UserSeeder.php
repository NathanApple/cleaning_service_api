<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'worker',
            'email' => 'worker'.'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'worker',
            'point' => 0

        ]);

        DB::table('users')->insert([
            'name' => 'supervisor',
            'email' => 'supervisor'.'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'supervisor',
            'point' => 0

        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin'.'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'point' => 0

        ]);
    }
}
