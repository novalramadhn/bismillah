<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('haris')->insert(
            [
                'nama_hari' => 'Senin'
            ]
        );
        DB::table('haris')->insert(
            [
                'nama_hari' => 'Selasa'
            ]
        );
        DB::table('haris')->insert(
            [
                'nama_hari' => 'Rabu'
            ]
        );
        DB::table('haris')->insert(
            [
                'nama_hari' => 'Kamis'
            ]
        );
        DB::table('haris')->insert(
            [
                'nama_hari' => 'Jum`at'
            ]
        );
    }
}
