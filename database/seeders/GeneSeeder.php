<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('genes')->insert([
            ['name' => 'Hài',],
            ['name' => 'Khoa học viễn tưởng',],
            ['name' => 'Kinh dị',],
            ['name' => 'Tình cảm',],
            ['name' => 'Chiến tranh',],
        ]);
    }
}
