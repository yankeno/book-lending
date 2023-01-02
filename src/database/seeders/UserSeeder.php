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
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'address' => '東京都千代田区1-1',
                'password' => Hash::make('password123'),
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'test1',
                'email' => 'test1@test.com',
                'address' => '東京都千代田区1-2',
                'password' => Hash::make('password123'),
                'created_at' => '2023-01-01 11:11:11',
            ]
        ]);
    }
}
