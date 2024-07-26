<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // runed
        DB::table('colors')->insert([
            ['color'=> 'Đen'],
            ['color'=> 'Trắng'],
            ['color'=> 'Xám'],
            ['color'=> 'Bạc'],
            ['color'=> 'Vàng'],
            ['color'=> 'Xanh'],
            ['color'=> 'Đỏ'],
            ['color'=> 'Hồng'],
        ]);
    }
}
