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
        
        $this->command->info('Starting database cleanup...');
        
        // Remove sample events first (they reference other tables)
        $eventCount = Event::count();
        $this->command->info("Found {$eventCount} events to delete");
        Event::query()->delete();
        
        // Remove sample clients
        $clientCount = Client::count();
        $this->command->info("Found {$clientCount} clients to delete");
        Client::query()->delete();
        
        // Remove sample staff
        $staffCount = Staff::count();
        $this->command->info("Found {$staffCount} staff to delete");
        Staff::query()->delete();
        
        // Remove sample menu items
        MenuItem::query()->delete();
        
        // Remove sample menu types
        MenuType::query()->delete();
        
        // Remove sample equipment
        Equipment::query()->delete();
        
        // Remove sample equipment types
        EquipmentType::query()->delete();
        
        // Remove sample locations
        Location::query()->delete();
        
        // Remove sample sections
        Section::query()->delete();
        
        $this->command->info('All records deleted. Adding dummy records...');
        
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

