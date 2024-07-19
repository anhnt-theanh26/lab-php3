<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 1; $i < 51; $i++) {
            DB::table('images')->insert([
                [
                    'clothes_id' => $i,
                    'url' => $faker->imageUrl(),
                ],
                [
                    'clothes_id' => $i,
                    'url' => $faker->imageUrl(),
                ],
                [
                    'clothes_id' => $i,
                    'url' => $faker->imageUrl(),
                ],
                [
                    'clothes_id' => $i,
                    'url' => $faker->imageUrl(),
                ],
            ]);
        }
    }
}
