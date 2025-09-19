<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'TheFinestGroup Admin',
            'email' => 'calendar@thefinestgroup.co.uk',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);
    }
}
