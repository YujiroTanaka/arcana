<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->truncate();
        DB::table('admin_users')->insert([
            'name' => 'owner',
            'email' => 'selfportraityu@gmail.com',
            'password' => Hash::make('GY7cMbr4CiQsvU@'),
            'admin_level' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_users')->insert([
            'name' => '管理者',
            'email' => 'info@goodbase.jp',
            'password' => Hash::make('GY7cMbr4CiQsvU@'),
            'admin_level' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
