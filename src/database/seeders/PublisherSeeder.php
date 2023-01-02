<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            [
                'name' => 'オライリージャパン',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '角川文庫',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'サンマーク出版',
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
