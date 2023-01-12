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
                'category_id' => 63,
                'title' => '実践ハイパフォーマンスMySQL',
                'isbn_13' => '9784873112091',
                'image' => 'sample1.jpg',
                'published_date' => '2013-11-25',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'publisher_id' => 2,
                'category_id' => 4,
                'title' => '夜は短し歩けよ乙女',
                'isbn_13' => '9784043878024',
                'image' => 'sample2.jpg',
                'published_date' => '2012-09-01',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'publisher_id' => 3,
                'category_id' => 8,
                'title' => '生き方',
                'isbn_13' => '9784763195432',
                'image' => 'sample3.jpg',
                'published_date' => '2012-07-01',
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
