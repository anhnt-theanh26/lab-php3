<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        DB::table('categories')->insert([
            ['name' => 'Tâm lý'],
            ['name' => 'Cuộc sống'],
            ['name' => 'Lịch sử'],
            ['name' => 'Xã hội'],
            ['name' => 'Kỹ năng phát triển bản thân'],
        ]);
    }
}
