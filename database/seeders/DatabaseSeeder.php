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

        // Create TheFinestGroup admin user (only if doesn't exist)
        User::firstOrCreate(
            ['email' => 'calendar@thefinestgroup.co.uk'],
            [
                'name' => 'TheFinestGroup Admin',
                'password' => bcrypt('admin'),
                'email_verified_at' => now(),
            ]
        );

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
