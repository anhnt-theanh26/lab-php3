<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('rams')->insert([
            ['ram'=> '32GB'],
            ['ram'=> '64GB'],
            ['ram'=> '128GB'],
            ['ram'=> '256GB'],
            ['ram'=> '512GB'],
            ['ram'=> '1TB'],
         ]);
    }
}
