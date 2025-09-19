<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Event;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'date' => '2024-05-19',
            'client_id' => 1,
            'location_id' => 1,
            'event_style' => 'CANAPES',
            'pax' => '150',
        ]);

        Event::create([
            'date' => '2024-05-23',
            'client_id' => 2,
            'location_id' => 2,
            'event_style' => 'SIT DOWN MEAL',
            'pax' => '35',
        ]);

        Event::create([
            'date' => '2024-06-19',
            'client_id' => 1,
            'location_id' => 1,
            'event_style' => 'CANAPES',
            'pax' => '150',
        ]);

        Event::create([
            'date' => '2024-07-23',
            'client_id' => 2,
            'location_id' => 2,
            'event_style' => 'SIT DOWN MEAL',
            'pax' => '35',
        ]);
    }
}
