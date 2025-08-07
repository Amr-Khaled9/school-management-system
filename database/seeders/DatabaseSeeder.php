<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Religion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BloodTableSeeder;
use Database\Seeders\ReligionTableSeeder;
use Database\Seeders\NationalitieTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitieTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
    }
}
