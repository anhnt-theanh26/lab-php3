<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // runed
        $faker = Faker::create();
        for ($i = 1; $i < 51; $i++) {
            DB::table('product_details')->insert([
                [
                    'product_id' => $i,
                    'ram_id' => rand(1, 6),
                    'price' => rand(1000000, 20000000),
                    'quantity' => rand(1, 100),
                ],
                [
                    'product_id' => $i,
                    'ram_id' => rand(1, 6),
                    'price' => rand(1000000, 20000000),
                    'quantity' => rand(1, 100),
                ],
                [
                    'product_id' => $i,
                    'ram_id' => rand(1, 6),
                    'price' => rand(1000000, 20000000),
                    'quantity' => rand(1, 100),
                ],
                [
                    'product_id' => $i,
                    'ram_id' => rand(1, 6),
                    'price' => rand(1000000, 20000000),
                    'quantity' => rand(1, 100),
                ],
            ]);
        }
    }
}
