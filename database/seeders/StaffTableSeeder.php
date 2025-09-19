<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'name' => 'Bob Smith 1',
            'mobile' => '07000 111111',
            'email' => 'Mail@Mail.com',
        ]);
        Staff::create([
            'name' => 'Bob Smith 2',
            'mobile' => '07000 111111',
            'email' => 'Mail@Mail.com',
        ]);
        Staff::create([
            'name' => 'Bob Smith 3',
            'mobile' => '07000 111111',
            'email' => 'Mail@Mail.com',
        ]);
        Staff::create([
            'name' => 'Bob Smith 4',
            'mobile' => '07000 111111',
            'email' => 'Mail@Mail.com',
        ]);
    }
}
