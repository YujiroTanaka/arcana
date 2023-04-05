<?php

use Illuminate\Database\Seeder;

class AdminInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_informations')->truncate();
        DB::table('admin_informations')->insert([
            'information_date' => '2023-03-23 00:00:00',
            'detail' => 'laravel導入',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-03-25 00:00:00',
            'detail' => 'フロント提出用完成',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-03-27 00:00:00',
            'detail' => 'お問い合わせメール送信機能追加',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-03-31 00:00:00',
            'detail' => 'フィードバック修正',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-04-04 00:00:00',
            'detail' => '管理画面ログイン機能',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-04-04 18:00:00',
            'detail' => '管理画面サイト変更履歴表示(ダッシュボード)',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => null,
            'detail' => '管理画面ブログ機能追加',
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-04-05 00:00:00',
            'detail' => '管理画面お問い合わせ表示',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => null,
            'detail' => 'フロントトップにシリーズバナー表示',
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_informations')->insert([
            'information_date' => '2023-04-05 00:00:00',
            'detail' => '管理画面サイト変更履歴管理(開発者のみ)',
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
