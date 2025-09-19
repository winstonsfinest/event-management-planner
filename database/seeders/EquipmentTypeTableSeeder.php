<?php

namespace Database\Seeders;

use App\Models\EquipmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EquipmentType::create([
            'name' => 'Electric',
        ]);
        EquipmentType::create([
            'name' => 'Glassware',
        ]);
        EquipmentType::create([
            'name' => 'Gas',
        ]);
    }
}
