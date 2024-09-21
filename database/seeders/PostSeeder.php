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
                'date' => '2024/09/16',
                'place' => '〇〇県××市',
                'playtitle' => 'ポケモンカード',
                'comment' => 'aaaaaa',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'date' => '2024/09/17',
                'place' => '□〇県△×市',
                'playtitle' => '遊戯王OCG',
                'comment' => 'bbbbbbb',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
