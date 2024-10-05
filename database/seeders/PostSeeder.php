<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->truncate(); //データを一旦削除
        
        DB::table('posts')->insert([
                'title' => 'title1',
                'date' => new DateTime(),
                //'place' => '〇〇県××市',
                'latitude' => 35.6585769,
                'longitude' => 139.7454506,
                'playtitle' => 'ポケモンカード',
                'comment' => 'aaaaaa',
                'user_id' -> {1},
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'title' => 'title2',
                'date' => new DateTime(),
                //'place' => '〇〇県××市',
                'latitude' => 35.6585769,
                'longitude' => 139.7454506,
                'playtitle' => '遊戯王OCG',
                'comment' => 'bbbbbbb',
                'user_id' -> 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
