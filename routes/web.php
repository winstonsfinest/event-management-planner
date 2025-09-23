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

// Alternative login route without CSRF for testing
Route::post('/doLogin-test', [HomeController::class, 'doLogin'])->name('doLogin-test');
Route::get('/form', [FormController::class, 'index'])->name('index');

// Test route to run cleanup command
Route::get('/test-cleanup', function () {
    try {
        \Artisan::call('db:cleanup');
        return response()->json([
            'success' => true,
            'message' => 'Cleanup command executed successfully!',
            'output' => \Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
});

// Test CSRF token
Route::get('/test-csrf', function () {
    return response()->json([
        'csrf_token' => csrf_token(),
        'session_id' => session()->getId(),
        'secure' => request()->secure(),
        'session_secure' => config('session.secure'),
        'session_driver' => config('session.driver'),
        'session_lifetime' => config('session.lifetime'),
    ]);
});

// Debug session
Route::get('/debug-session', function () {
    session(['test' => 'value']);
    return response()->json([
        'session_data' => session()->all(),
        'session_id' => session()->getId(),
        'csrf_token' => csrf_token(),
    ]);
});

// Debug asset URLs
Route::get('/debug-assets', function () {
    return response()->json([
        'app_url' => config('app.url'),
        'asset_css' => asset('assets/css/adminlte.min.css'),
        'asset_js' => asset('assets/js/jquery.min.js'),
        'public_path' => public_path(),
        'asset_path' => public_path('assets/css/adminlte.min.css'),
        'file_exists' => file_exists(public_path('assets/css/adminlte.min.css')),
    ]);
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
