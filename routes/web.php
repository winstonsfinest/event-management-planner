<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\MenuTypeController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('admin.index');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/doLogin', [HomeController::class, 'doLogin'])->name('doLogin');
Route::get('/form', [FormController::class, 'index'])->name('index');

// Temporary route to run database cleanup
Route::get('/cleanup-db', function () {
    try {
        \Artisan::call('db:seed', ['--class' => 'DatabaseCleanupSeeder']);
        return response()->json([
            'success' => true,
            'message' => 'Database cleanup completed successfully!',
            'output' => \Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
});

// Force cleanup - delete all and add exactly one record to each table
Route::get('/force-cleanup', function () {
    try {
        // Delete ALL records from each table
        \App\Models\Event::query()->delete();
        \App\Models\Client::query()->delete();
        \App\Models\Staff::query()->delete();
        \App\Models\Location::query()->delete();
        
        // Create exactly ONE client
        $client = \App\Models\Client::create([
            'business_name' => 'Sample Client Company',
            'business_address' => '123 Sample Street, Sample City, SC1 2AB',
            'contact_name' => 'John Sample',
        ]);
        
        // Create exactly ONE staff
        $staff = \App\Models\Staff::create([
            'name' => 'Jane Sample',
            'mobile' => '07000 123456',
            'email' => 'jane.sample@example.com',
        ]);
        
        // Create exactly ONE location
        $location = \App\Models\Location::create([
            'name' => 'Sample Venue',
            'address' => '456 Venue Road, Event City, EC1 3CD',
        ]);
        
        // Create exactly ONE event
        $event = \App\Models\Event::create([
            'date' => '2024-12-31',
            'client_id' => $client->id,
            'location_id' => $location->id,
            'event_style' => 'SAMPLE EVENT',
            'pax' => '50',
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Force cleanup completed!',
            'records_created' => [
                'client_id' => $client->id,
                'staff_id' => $staff->id,
                'location_id' => $location->id,
                'event_id' => $event->id,
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
});

Route::name('admin.')->middleware('auth')->group(function () {

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');

        Route::get('/add', [EventController::class, 'add'])->name('add');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        Route::post('/', [EventController::class, 'store'])->name('store');
        Route::get('/{event}', [EventController::class, 'show'])->name('show');
        Route::post('/{event}', [EventController::class, 'update'])->name('update');
        Route::post('/{event}/delete', [EventController::class, 'delete'])->name('delete');
    });

    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');

        Route::get('/add', [ClientController::class, 'add'])->name('add');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');
        Route::post('/', [ClientController::class, 'store'])->name('store');
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');
        Route::post('/{client}', [ClientController::class, 'update'])->name('update');
    });

    Route::prefix('menu_types')->name('menu_types.')->group(function () {
        Route::get('/', [MenuTypeController::class, 'index'])->name('index');

        Route::get('/add', [MenuTypeController::class, 'add'])->name('add');
        Route::get('/{menu_type}/edit', [MenuTypeController::class, 'edit'])->name('edit');
        Route::post('/', [MenuTypeController::class, 'store'])->name('store');
        Route::get('/{menu_type}', [MenuTypeController::class, 'show'])->name('show');
        Route::post('/{menu_type}', [MenuTypeController::class, 'update'])->name('update');
    });

    Route::prefix('menu_items')->name('menu_items.')->group(function () {
        Route::get('/', [MenuItemController::class, 'index'])->name('index');

        Route::get('/add', [MenuItemController::class, 'add'])->name('add');
        Route::get('/{menu_item}/edit', [MenuItemController::class, 'edit'])->name('edit');
        Route::post('/', [MenuItemController::class, 'store'])->name('store');
        Route::get('/{menu_item}', [MenuItemController::class, 'show'])->name('show');
        Route::post('/{menu_item}', [MenuItemController::class, 'update'])->name('update');
    });

    Route::prefix('staffs')->name('staffs.')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('index');

        Route::get('/add', [StaffController::class, 'add'])->name('add');
        Route::get('/{staff}/edit', [StaffController::class, 'edit'])->name('edit');
        Route::post('/', [StaffController::class, 'store'])->name('store');
        Route::get('/{staff}', [StaffController::class, 'show'])->name('show');
        Route::post('/{staff}', [StaffController::class, 'update'])->name('update');
    });

    Route::prefix('equipments')->name('equipments.')->group(function () {
        Route::get('/', [EquipmentController::class, 'index'])->name('index');

        Route::get('/add', [EquipmentController::class, 'add'])->name('add');
        Route::get('/{equipment}/edit', [EquipmentController::class, 'edit'])->name('edit');
        Route::post('/', [EquipmentController::class, 'store'])->name('store');
        Route::get('/{equipment}', [EquipmentController::class, 'show'])->name('show');
        Route::post('/{equipment}', [EquipmentController::class, 'update'])->name('update');
    });
});
