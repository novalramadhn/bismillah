<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert(
            [
                'semester' => 'Ganjil'
            ]
        );
        DB::table('semesters')->insert(
            [
                'semester' => 'Genap'
            ]
        );
    }
}
