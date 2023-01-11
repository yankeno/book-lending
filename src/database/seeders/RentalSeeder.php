<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->insert([
            [
                'user_id' => 1,
                'book_id' => 2,
                'checkout_date' => '2022-12-31',
                'return_date' => '2023-01-08',
                'is_returned' => 1,
                'created_at' => '2022-12-31 11:11:11',
                'updated_at' => '2023-01-08 11:11:11',
            ],
            [
                'user_id' => 2,
                'book_id' => 3,
                'checkout_date' => '2022-12-28',
                'return_date' => '2023-01-15',
                'is_returned' => 0,
                'created_at' => '2022-12-31 11:11:11',
                'updated_at' => '2022-12-31 11:11:11',
            ],
        ]);
    }
}
