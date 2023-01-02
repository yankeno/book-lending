<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'publisher_id' => 1,
                'title' => '実践ハイパフォーマンスMySQL',
                'isbn_13' => '9784873112091',
                'image' => 'sample1.jpg',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'publisher_id' => 2,
                'title' => '夜は短し歩けよ乙女',
                'isbn_13' => '9784043878024',
                'image' => 'sample2.jpg',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'publisher_id' => 3,
                'title' => '生き方',
                'isbn_13' => '9784763195432',
                'image' => 'sample3.jpg',
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
