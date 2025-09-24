<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\MenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuItemController extends BaseController
{
    public function index(Request $request): View
    {
        $menuTypeId = $request->get('menu_type_id');

        $menuItems = MenuItem::when($menuTypeId, function ($query, $menuTypeId) {
            return $query->where('menu_type_id', $menuTypeId);
        })->get();

        return view('admin.menu_items.index', compact('menuItems', 'menuTypeId'));
    }

    public function add(): View
    {
        return view('admin.menu_items.add');
    }

    public function edit(MenuItem $menuItem): View
    {
        $isEdit = true;
        return view('admin.menu_items.edit', compact('menuItem', 'isEdit'));
    }

    public function show(MenuItem $menuItem): View
    {
        return view('admin.menu_items.edit', compact('menuItem'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $request->all();

            $data['prep_list'] = array_filter($data['prep_list'] ?? []);
            $menuItem = MenuItem::create($data);

            if($request->get('ingredients')) {
                $menuItem->ingredients()->sync($request->get('ingredients'));
            }

            $ingredientIds = $request->get('ingredient_ids') ?? [];
            $ingredientNames = $request->get('ingredient_names');
            $ingredientWeights = $request->get('ingredient_weights');
            $ingredientUnits = $request->get('ingredient_units');

            foreach ($ingredientIds as $key => $ingredientId) {
                $menuItem->ingredients()->create([
                    'name' => $ingredientNames[$key],
                    'weight' => $ingredientWeights[$key],
                    'unit' => $ingredientUnits[$key],
                ]);
            }

            return redirect()->route('admin.menu_items.index')->with('success', 'Menu Item created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, MenuItem $menuItem): RedirectResponse
    {
        try {
            $data = $request->all();

            $data['prep_list'] = array_filter($data['prep_list'] ?? []);
            $menuItem->update($data);

            $ingredientIds = $request->get('ingredient_ids') ?? [];
            $ingredientNames = $request->get('ingredient_names');
            $ingredientWeights = $request->get('ingredient_weights');
            $ingredientUnits = $request->get('ingredient_units');

            foreach ($ingredientIds as $key => $ingredientId) {
                if($ingredientId){
                    if(!$ingredientNames[$key] && !$ingredientWeights[$key]){
                        $menuItem->ingredients()->find($ingredientId)->delete();
                    } else {
                        $menuItem->ingredients()->find($ingredientId)->update([
                            'name' => $ingredientNames[$key],
                            'weight' => $ingredientWeights[$key],
                            'unit' => $ingredientUnits[$key],
                        ]);
                    }
                }else{
                    $menuItem->ingredients()->create([
                        'name' => $ingredientNames[$key],
                        'weight' => $ingredientWeights[$key],
                        'unit' => $ingredientUnits[$key],
                    ]);
                }
            }

            return redirect()->route('admin.menu_items.index')->with('success', 'Menu Item updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
