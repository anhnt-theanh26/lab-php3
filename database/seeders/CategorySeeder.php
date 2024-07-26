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
        // runed
        $faker = Faker::create();
        DB::table('categories')->insert([
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'Huawei'],
            ['name' => 'Xiaomi'],
            ['name' => 'Nokia'],
        ]);
    }
}
