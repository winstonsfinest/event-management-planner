<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Equipment;
use App\Models\Event;
use App\Models\Location;
use App\Models\MenuItem;
use App\Models\MenuType;
use App\Models\Section;
use App\Models\Staff;
use App\Models\EquipmentType;
use Illuminate\Database\Seeder;

class DatabaseCleanupSeeder extends Seeder
{
    /**
     * Run the database cleanup.
     */
    public function run(): void
    {
        // Clean up sample data while keeping the admin user
        
        // Remove sample events first (they reference other tables)
        Event::truncate();
        
        // Remove sample clients
        Client::truncate();
        
        // Remove sample staff
        Staff::truncate();
        
        // Remove sample menu items
        MenuItem::truncate();
        
        // Remove sample menu types
        MenuType::truncate();
        
        // Remove sample equipment
        Equipment::truncate();
        
        // Remove sample equipment types
        EquipmentType::truncate();
        
        // Remove sample locations
        Location::truncate();
        
        // Remove sample sections
        Section::truncate();
        
        // Add one dummy record to each main table
        $this->addDummyRecords();
        
        $this->command->info('Database cleanup completed successfully!');
        $this->command->info('All sample data has been removed.');
        $this->command->info('One dummy record added to Clients, Events, and Staff tables.');
        $this->command->info('Admin user (calendar@thefinestgroup.co.uk) has been preserved.');
    }

    /**
     * Add one dummy record to each main table
     */
    private function addDummyRecords(): void
    {
        // Add one dummy client
        $client = Client::create([
            'business_name' => 'Sample Client Company',
            'business_address' => '123 Sample Street, Sample City, SC1 2AB',
            'contact_name' => 'John Sample',
        ]);

        // Add one dummy staff member
        $staff = Staff::create([
            'name' => 'Jane Sample',
            'mobile' => '07000 123456',
            'email' => 'jane.sample@example.com',
        ]);

        // Add one dummy location (needed for events)
        $location = Location::create([
            'name' => 'Sample Venue',
            'address' => '456 Venue Road, Event City, EC1 3CD',
        ]);

        // Add one dummy event
        Event::create([
            'date' => '2024-12-31',
            'client_id' => $client->id,
            'location_id' => $location->id,
            'event_style' => 'SAMPLE EVENT',
            'pax' => '50',
        ]);
    }
}

