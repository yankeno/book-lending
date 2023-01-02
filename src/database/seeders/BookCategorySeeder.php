<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_category')->insert([
            [
                'book_id' => 1,
                'category_id' => 11,
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'book_id' => 2,
                'category_id' => 23,
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'book_id' => 3,
                'category_id' => 13,
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
