<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'name' => 'デレク・J. ベリング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'ジェレミ・D. ザウドニ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '森見 登美彦',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '稲盛 和夫',
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
