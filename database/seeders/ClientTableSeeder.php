<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Equipment;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'business_name' => 'ENCIRC GLASS',
            'business_address' => 'GLASS ROAD, ELTON, CHESTER. CH2 3NB',
            'contact_name' => 'ISABELLA BROOKE',
        ]);
        Client::create([
            'business_name' => 'AAA LAWYERS',
            'business_address' => 'LAWYER ROAD, CHESTER. CH1 4NX',
            'contact_name' => 'SUZIE DIAMOND',
        ]);
        Client::create([
            'business_name' => 'FORD MOTORCARS',
            'business_address' => 'MOTORCAR ROAD. LONDON, W1A XBX',
            'contact_name' => 'HENRY FORD',
        ]);
        Client::create([
            'business_name' => 'THE BAKERY',
            'business_address' => 'BAKING LANE, LONDON, WC1B 4AX ',
            'contact_name' => 'DAVE BAKER',
        ]);
    }
}
