<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(['name' => 'ILS']);
        DB::table('currencies')->insert(['name' => 'USD']);
        DB::table('currencies')->insert(['name' => 'EUR']);
    }
}
