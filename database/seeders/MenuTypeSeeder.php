<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\MenuType;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuType::create([
            'name' => 'SWEET CANAPES',
        ]);
        MenuType::create([
            'name' => 'SAVOURY CANAPES',
        ]);
        MenuType::create([
            'name' => 'SAVOURY BOWL FOOD',
        ]);
        MenuType::create([
            'name' => 'STREET FOOD',
        ]);
    }
}
