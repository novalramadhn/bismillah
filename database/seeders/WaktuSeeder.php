<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waktus')->insert(
            [
                'jam' => '07.00 - 09.30'
            ]
        );
        DB::table('waktus')->insert(
            [
                'jam' => '10.00 - 12.00'
            ]
        );
        DB::table('waktus')->insert(
            [
                'jam' => '12.00 - 13.30'
            ]
        );
    }
}
