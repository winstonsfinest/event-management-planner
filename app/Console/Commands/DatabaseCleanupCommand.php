<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\Event;
use App\Models\Location;
use App\Models\Staff;
use App\Models\MenuItem;
use App\Models\MenuType;
use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\Section;
use Illuminate\Console\Command;

class DatabaseCleanupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up database by removing all records and adding one dummy record to each main table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting database cleanup...');
        
        // Delete ALL records from each table
        $eventCount = Event::count();
        $this->info("Found {$eventCount} events to delete");
        Event::query()->delete();
        
        $clientCount = Client::count();
        $this->info("Found {$clientCount} clients to delete");
        Client::query()->delete();
        
        $staffCount = Staff::count();
        $this->info("Found {$staffCount} staff to delete");
        Staff::query()->delete();
        
        Location::query()->delete();
        MenuItem::query()->delete();
        MenuType::query()->delete();
        Equipment::query()->delete();
        EquipmentType::query()->delete();
        Section::query()->delete();
        
        $this->info('All records deleted. Adding dummy records...');
        
        // Create exactly ONE client
        $client = Client::create([
            'business_name' => 'Sample Client Company',
            'business_address' => '123 Sample Street, Sample City, SC1 2AB',
            'contact_name' => 'John Sample',
        ]);
        $this->info("Created client with ID: {$client->id}");
        
        // Create exactly ONE staff
        $staff = Staff::create([
            'name' => 'Jane Sample',
            'mobile' => '07000 123456',
            'email' => 'jane.sample@example.com',
        ]);
        $this->info("Created staff with ID: {$staff->id}");
        
        // Create exactly ONE location
        $location = Location::create([
            'name' => 'Sample Venue',
            'address' => '456 Venue Road, Event City, EC1 3CD',
        ]);
        $this->info("Created location with ID: {$location->id}");
        
        // Create exactly ONE event
        $event = Event::create([
            'date' => '2024-12-31',
            'client_id' => $client->id,
            'location_id' => $location->id,
            'event_style' => 'SAMPLE EVENT',
            'pax' => '50',
        ]);
        $this->info("Created event with ID: {$event->id}");
        
        $this->info('Database cleanup completed successfully!');
        $this->info('One dummy record added to Clients, Events, and Staff tables.');
        
        return Command::SUCCESS;
    }
}
