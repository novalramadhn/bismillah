<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapels')->insert(
            [
                'kode_mapel' => 'QH-A',
                'nama_mapel' => 'Al-Qur`an Hadis',
            ],
        );
        //2
        DB::table('mapels')->insert(
            [
                'kode_mapel' => 'AA-A',
                'nama_mapel' => 'Akidah Akhlak',
            ],
        );
        //3
        DB::table('mapels')->insert(
            [
                'kode_mapel' => 'FQ-A',
                'nama_mapel' => 'Fikih',
            ],
        );
        //4
        DB::table('mapels')->insert(
            [
                'kode_mapel' => 'SKI-A',
                'nama_mapel' => 'Sejarah Kebudayaan Islam',
            ],
        );
        //5
        DB::table('mapels')->insert(
            [
                'kode_mapel' => 'PPKN-A',
                'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            ],
        );
        //6
        DB::table('mapels')->insert(
            [
                'kode_mapel' => 'BIN-A',
                'nama_mapel' => 'Bahasa indonesia',
            ],
        );
    }
}
