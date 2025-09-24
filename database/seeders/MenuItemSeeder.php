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
        // Clear existing menu items first
        MenuItem::query()->delete();
        
        // Sweet Canapés (Menu Type 1)
        MenuItem::create([
            'name' => 'Mini Chocolate Éclairs',
            'menu_type_id' => 1,
            'description' => 'Delicate choux pastry filled with vanilla cream and topped with dark chocolate ganache',
            'allergens' => 'Contains: Gluten, Eggs, Dairy, Nuts (if applicable)',
        ]);
        
        MenuItem::create([
            'name' => 'Raspberry Macarons',
            'menu_type_id' => 1,
            'description' => 'French macarons with raspberry filling and dusted with powdered sugar',
            'allergens' => 'Contains: Eggs, Nuts, Dairy',
        ]);
        
        MenuItem::create([
            'name' => 'Lemon Curd Tartlets',
            'menu_type_id' => 1,
            'description' => 'Buttery pastry cases filled with tangy lemon curd and topped with fresh berries',
            'allergens' => 'Contains: Gluten, Eggs, Dairy',
        ]);
        
        // Savoury Canapés (Menu Type 2)
        MenuItem::create([
            'name' => 'Smoked Salmon Blinis',
            'menu_type_id' => 2,
            'description' => 'Traditional buckwheat blinis topped with cream cheese and smoked Scottish salmon',
            'allergens' => 'Contains: Gluten, Eggs, Dairy, Fish',
        ]);
        
        MenuItem::create([
            'name' => 'Beef Wellington Bites',
            'menu_type_id' => 2,
            'description' => 'Mini beef wellington with mushroom duxelles wrapped in puff pastry',
            'allergens' => 'Contains: Gluten, Eggs, Dairy',
        ]);
        
        MenuItem::create([
            'name' => 'Goat Cheese & Fig Crostini',
            'menu_type_id' => 2,
            'description' => 'Grilled sourdough topped with goat cheese, fresh figs, and honey drizzle',
            'allergens' => 'Contains: Gluten, Dairy',
        ]);
        
        MenuItem::create([
            'name' => 'Caprese Skewers',
            'menu_type_id' => 2,
            'description' => 'Fresh mozzarella, cherry tomatoes, and basil on skewers with balsamic glaze',
            'allergens' => 'Contains: Dairy',
        ]);
        
        // Savoury Bowl Food (Menu Type 3)
        MenuItem::create([
            'name' => 'Thai Green Curry',
            'menu_type_id' => 3,
            'description' => 'Fragrant coconut curry with mixed vegetables and jasmine rice',
            'allergens' => 'Contains: Coconut',
        ]);
        
        MenuItem::create([
            'name' => 'Mediterranean Buddha Bowl',
            'menu_type_id' => 3,
            'description' => 'Quinoa base with roasted vegetables, hummus, and tahini dressing',
            'allergens' => 'Contains: Sesame',
        ]);
        
        MenuItem::create([
            'name' => 'Moroccan Lamb Tagine',
            'menu_type_id' => 3,
            'description' => 'Slow-cooked lamb with apricots, almonds, and couscous',
            'allergens' => 'Contains: Nuts',
        ]);
        
        // Street Food (Menu Type 4)
        MenuItem::create([
            'name' => 'Korean BBQ Tacos',
            'menu_type_id' => 4,
            'description' => 'Soft tacos filled with Korean-style beef, kimchi, and sriracha mayo',
            'allergens' => 'Contains: Gluten, Eggs, Soy',
        ]);
        
        MenuItem::create([
            'name' => 'Gourmet Sliders Trio',
            'menu_type_id' => 4,
            'description' => 'Three mini burgers: Classic beef, pulled pork, and vegetarian',
            'allergens' => 'Contains: Gluten, Eggs, Dairy',
        ]);
        
        MenuItem::create([
            'name' => 'Loaded Nachos',
            'menu_type_id' => 4,
            'description' => 'Crispy tortilla chips with cheese, jalapeños, sour cream, and guacamole',
            'allergens' => 'Contains: Dairy',
        ]);
    }
}
