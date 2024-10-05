<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate(); //データを一旦削除
        
        DB::table('users')->insert([
                'name' => 'AIUEO',
                'email' => '〇〇@gmail.com',
                'password' => 'qwerty1234',
                'playtitle' => 'MTG',
                'image_url' => 'https://~',
                'comment' => 'aaaaaaa',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
