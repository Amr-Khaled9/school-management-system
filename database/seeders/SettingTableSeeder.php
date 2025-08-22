<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('settings')->delete();
        $data = [
            ['key' => 'current_session', 'value' => '2025-2026'],
            ['key' => 'school_title', 'value' => 'NS'],
            ['key' => 'school_name', 'value' => ' National School'],
            ['key' => 'end_first_term', 'value' => '01-12-2025'],
            ['key' => 'end_second_term', 'value' => '01-03-2026'],
            ['key' => 'phone', 'value' => '01145094316'],
            ['key' => 'address', 'value' => 'بني سويف'],
            ['key' => 'school_email', 'value' => 'school@gamil.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);

    }
}
