<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::create([
            'name' => 'Oven',
            'section_id' => 1,
            'equipment_type_id' => 1,
        ]);
        Equipment::create([
            'name' => 'Wine Glasses',
            'section_id' => 2,
            'equipment_type_id' => 2,
        ]);
        Equipment::create([
            'name' => 'Induction Hob',
            'section_id' => 1,
            'equipment_type_id' => 1,
        ]);
        Equipment::create([
            'name' => 'BarbeQue',
            'section_id' => 1,
            'equipment_type_id' => 3,
        ]);
    }
}
