<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('clothes')->insert([
                'name' => $faker->text(20), 
                'quantity' => rand(10, 50), 
                'price_old' => rand(100000, 500000), 
                'price_new' => rand(50000, 250000), 
                'sold' => rand(10,50), 
                'image_url' => $faker->imageUrl(), // Tạo URL hình ảnh ngẫu nhiên
                'category_id' => rand(1,5),
            ]);
        }
    }
}
