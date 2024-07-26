<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //runed
        $faker = Faker::create();
        for ($i = 1; $i < 51; $i++) {
            DB::table('products')->insert([
                [
                    'name' => $faker->text(50),
                    'category_id' => rand(1, 5),
                    'description' => $faker->text(500),
                    'views' => rand(100, 500),
                    'image' => $faker->imageUrl(),
                    'product_color_id' => $i,
                ],
            ]);
        }
    }
}
