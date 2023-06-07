<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert(
            [
                'kode_kelas' => '1 \ A',
                'nama_kelas' => 'VII - A',
                'ruangan' => '1.1'
            ]
        );
        DB::table('kelas')->insert(
            [
                'kode_kelas' => '1 \ B',
                'nama_kelas' => 'VII - B',
                'ruangan' => '1.2'
            ]
        );
        DB::table('kelas')->insert(
            [
                'kode_kelas' => '2 \ A',
                'nama_kelas' => 'VIII - A',
                'ruangan' => '2.1'
            ]
        );
        DB::table('kelas')->insert(
            [
                'kode_kelas' => '2 \ B',
                'nama_kelas' => 'VIII - B',
                'ruangan' => '2.2'
            ]
        );
        DB::table('kelas')->insert(
            [
                'kode_kelas' => '3 \ A',
                'nama_kelas' => 'IX - A',
                'ruangan' => '3.1'
            ]
        );
        DB::table('kelas')->insert(
            [
                'kode_kelas' => '3 \ B',
                'nama_kelas' => 'IX - B',
                'ruangan' => '3.2'
            ]
        );
    }
}
