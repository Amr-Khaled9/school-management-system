<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('specializations')->delete();
        $specializations =     [
            'عربي',
            'علوم',
            'حاسب الي',
            'انجليزي'
        ];

        foreach ($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization,
            ]);
        }
    }
}
