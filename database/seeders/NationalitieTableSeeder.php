<?php

namespace Database\Seeders;

use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nationalities')->delete();

        $langs = [

            'جزائري',
            'بحريني',
            'مصري',
            'عراقي',
            'أردني',
            'كويتي',
            'لبناني',
            'ليبي',
            'موريتانيي',
            'مغربي',
            'عماني',
            'فلسطيني',
            'قطري',
            'سعودي',
            'صومالي',
            'سوداني',
            'سوادني جنوبي',
            'سوري',
            'تونسي',
            'إماراتي',
            'يمني',
            'جيبوتي',
            'جزر القمر'
        ];
        foreach ($langs as $n) {
            Nationalitie::create(['name' => $n]);
        }
    }
}
