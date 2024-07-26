<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 1; $i <= 51; $i++) {
            DB::table('moives')->insert([
                'title' => $faker->text(20),
                'poster' => $faker->imageUrl(),
                'intro' => $faker->text(100),
                'release_date' => $faker->date(),
                'genre_id' => rand(1, 5),
            ]);
        }
    }
}
