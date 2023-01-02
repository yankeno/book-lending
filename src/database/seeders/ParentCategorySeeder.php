<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_categories')->insert([
            [
                'name' => '文学・評論',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '人文・思想',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '社会・政治',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'ノンフィクション',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '歴史・地理',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'ビジネス・経済',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '投資・金融・会社経営',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '科学・テクノロジー',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '医学・薬学・看護学・歯科学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'コンピュータ・IT',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'アート・建築・デザイン',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '実用',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '趣味',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'スポーツ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => 'アウトドア',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '資格・検定・就職',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '暮らし・健康・子育て',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '旅行ガイド・マップ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '語学・辞事典・年鑑',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '教育・学参・受験',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '絵本・児童書',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '新書・文庫',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '雑誌',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'name' => '楽譜・スコア・音楽書',
                'created_at' => '2023-01-01 11:11:11',
            ],

        ]);
    }
}
