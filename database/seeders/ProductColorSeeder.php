<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // runed
        for ($i = 1; $i < 51; $i++) {
            DB::table('product_color')->insert([
                [
                    'product_id' => $i,
                    'color_id' => rand(1, 8),
                ],
                [
                    'product_id' => $i,
                    'color_id' => rand(1, 8),
                ],
                [
                    'product_id' => $i,
                    'color_id' => rand(1, 8),
                ],
                [
                    'product_id' => $i,
                    'color_id' => rand(1, 8),
                ],
            ]);
        }
    }
}
