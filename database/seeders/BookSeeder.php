<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i <= 20; $i++) {
            DB::table('books')->insert([
                'title' => $faker->text(20),
                'thumbnail' => 'https://tiki.vn/blog/wp-content/uploads/2023/08/phan-4-dac-nhan-tam-1024x1024.jpg',
                'author'=>$faker->text(20),
                'publisher'=>$faker->text(20),
                'publication'=>$faker->date(),
                'price'=>rand(10000,500000),
                'quantity'=>rand(1,100),
                'category_id'=>rand(1,5),
            ]);
        }
    }
}
