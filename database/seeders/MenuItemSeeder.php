<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\MenuItem;
use App\Models\MenuType;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'name' => 'BLACKBEAN CHILLI TOSTADA',
            'menu_type_id' => 1,
        ]);
        MenuItem::create([
            'name' => 'MINIATURE YORKSHIRE PUDDING WITH ROAST BEEF & ROSEMARY AIOILI',
            'menu_type_id' => 1,
        ]);
        MenuItem::create([
            'name' => 'SMOKED SALMON AND LEMON CREME FRAICHE WITH DILL',
            'menu_type_id' => 2,
        ]);
        MenuItem::create([
            'name' => 'MINIATURE VEGAN SAMOSA',
            'menu_type_id' => 2,
        ]);
    }
}
