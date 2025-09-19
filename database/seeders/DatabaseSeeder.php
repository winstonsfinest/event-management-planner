<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        $this->call([
            SectionTableSeeder::class,
            EquipmentTypeTableSeeder::class,
            EquipmentTableSeeder::class,
            StaffTableSeeder::class,
            ClientTableSeeder::class,
            EventTableSeeder::class,
            MenuTypeSeeder::class,
            MenuItemSeeder::class,
            LocationTableSeeder::class,
        ]);
    }
}
