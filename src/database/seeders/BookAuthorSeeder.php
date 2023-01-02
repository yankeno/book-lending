<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_author')->insert([
            [
                'book_id' => 1,
                'author_id' => 1,
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'book_id' => 1,
                'author_id' => 2,
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'book_id' => 2,
                'author_id' => 3,
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'book_id' => 3,
                'author_id' => 4,
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
