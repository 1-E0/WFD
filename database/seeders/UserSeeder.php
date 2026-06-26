<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'name' => 'Admin Kampus',
                'email' => 'admin@simruang.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,
            ],
            [
                'name' => 'Daniel Alvino',
                'email' => 'daniel@simruang.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ]
        ]);
    }
}