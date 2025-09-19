<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'Chester',
            'London',
            'Manchester',
            'Leeds',
            'Liverpool',
            'North West',
            'Yorkshire',
            'Midlands',
            'South East',
            'Wales',
        ];

        foreach ($arr as $item) {
            \App\Models\Location::create([
                'name' => $item,
            ]);
        }
    }
}
