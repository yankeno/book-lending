<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'parent_category_id' => 1,
                'name' => '文芸作品',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 1,
                'name' => '歴史・時代小説',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 1,
                'name' => '経済・社会小説',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 1,
                'name' => 'ミステリー・サスペンス・ハードボイルド',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 1,
                'name' => 'SF・ホラー・ファンタジー',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 1,
                'name' => 'エッセー・随筆',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 1,
                'name' => '古典',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 2,
                'name' => '哲学・思想',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 2,
                'name' => '倫理学・道徳',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 2,
                'name' => '宗教',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 2,
                'name' => '心理学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 2,
                'name' => '言語学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 2,
                'name' => '教育学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '政治',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '外交・国際関係',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '軍事',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '法律',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '社会学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '福祉',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 3,
                'name' => '環境・エコロジー',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => '自伝・伝記',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => '思想・社会',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => '事件・犯罪',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => '歴史・地理・旅行記',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => 'ビジネス・経済',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => '科学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 4,
                'name' => 'アート・エンターテイメント',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 5,
                'name' => '歴史学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 5,
                'name' => '日本史',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 5,
                'name' => '世界史',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 5,
                'name' => '考古学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 5,
                'name' => '地理 地域研究',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 5,
                'name' => '地図',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => '経営戦略',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => 'マーケティング・セールス',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => '経理・アカウンティング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => '金融・ファイナンス',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => 'オペレーションズ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => 'マネジメント・人材管理',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 6,
                'name' => '統計学・数学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '一般・投資読み物',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '株式投資・投資信託',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '不動産投資',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '債券・為替・外貨預金',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '銀行・金融業',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '証券・金融市場',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 7,
                'name' => '年金・保険',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '数学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '物理学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '化学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '宇宙学・天文学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '生物・バイオテクノロジー',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '工学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 8,
                'name' => '電気・通信',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '医学一般',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '基礎医学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '臨床医学一般',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '臨床内科',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '臨床外科',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '産科・婦人科学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 9,
                'name' => '小児科学',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => '入門書',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => 'プログラミング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => 'アプリケーション',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => 'OS',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => 'Web作成・開発',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => 'ネットワーク',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 10,
                'name' => 'データベース',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => '写真',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => '絵画',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => '彫刻・工芸',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => '作品集',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => '建築',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => '住宅建築・家づくり',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 11,
                'name' => 'デザイン',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => '自己啓発',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => '常識・マナー',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => '素材・デザイン集',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => '一般マナー・心得',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => 'スピーチ・話し方',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => '手紙・文章の書き方',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 12,
                'name' => 'ペン字',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => '手芸・クラフト',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => '車・バイク',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => '鉄道',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => 'カメラ・ビデオ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => 'オーディオ・ビジュアル',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => '占い',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 13,
                'name' => 'パズル・ゲーム',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => '野球',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => 'サッカー・フットサル',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => 'ゴルフ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => 'マラソン・ランニング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => 'テニス',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => 'アイススケート',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 14,
                'name' => '筋力トレーニング・ストレッチ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 15,
                'name' => 'キャンプ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 15,
                'name' => '登山・ハイキング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 15,
                'name' => '自転車・サイクリング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 15,
                'name' => '釣り',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 15,
                'name' => 'カヌー・カヤック',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 15,
                'name' => 'クライミング・ボルダリング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => '学生の就職',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => '法律関連',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => 'ビジネス関連',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => '事務関連',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => 'コンピュータ・情報処理',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => '医療・看護',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 16,
                'name' => '建築・土木',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => 'クッキング・レシピ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => 'ワイン・お酒',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => '住まい・インテリア',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => 'ガーデニング',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => 'ペット',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => '美容・ダイエット',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => '恋愛・結婚・離婚',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 17,
                'name' => '妊娠・出産・子育て',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 18,
                'name' => '海外旅行',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 18,
                'name' => '国内旅行',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 18,
                'name' => '時刻表',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 18,
                'name' => 'シティマップ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 18,
                'name' => 'ロードマップ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => '英語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => '日本語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => '韓国・朝鮮語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => '中国語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => 'フランス語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => 'スペイン語・ポルトガル語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 19,
                'name' => 'ドイツ語・ゲルマン諸語',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '幼児教育',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '小学教科書・参考書',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '中学教科書・参考書',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '高校教科書・参考書',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '大学・大学院',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '専門学校受験・ガイド',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 20,
                'name' => '海外留学対策',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => '絵本',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => '読み物(児童文学)',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => 'ノンフィクション・伝記',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => '実用・工作・趣味',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => '学習',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => '図鑑・事典・年鑑',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 21,
                'name' => '学習まんが',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 22,
                'name' => '文学・評論',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 22,
                'name' => '思想・人文',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 22,
                'name' => '政治・社会',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 22,
                'name' => '歴史・地理',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 22,
                'name' => 'ビジネス・経済',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => '音楽・映画・テレビ・芸能',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => '女性ファッション・ライフスタイル',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => 'コミック・アニメ・BL',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => 'スポーツ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => 'ビジネス・経済・経営・投資',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => '男性ファッション・ライフスタイル',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => 'クルマ・バイク・乗り物',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 23,
                'name' => '健康・生活情報',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => 'クラシック',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => 'J-POP',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => '洋楽',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => 'ジャズ',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => 'ヴォーカル',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => 'ワールド',
                'created_at' => '2023-01-01 11:11:11',
            ],
            [
                'parent_category_id' => 24,
                'name' => 'アニメ＆ゲーム音楽',
                'created_at' => '2023-01-01 11:11:11',
            ],
        ]);
    }
}
