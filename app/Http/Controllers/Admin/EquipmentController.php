<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Equipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EquipmentController extends BaseController
{
    public function index(): View
    {
        $equipments = Equipment::all();

        return view('admin.equipments.index', compact('equipments'));
    }

    public function add(): View
    {
        return view('admin.equipments.add');
    }

    public function edit(Equipment $equipment): View
    {
        $isEdit = true;
        return view('admin.equipments.edit', compact('equipment', 'isEdit'));
    }

    public function show(Equipment $equipment): View
    {
        return view('admin.equipments.edit', compact('equipment'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $equipment = Equipment::create($request->all());

            return redirect()->route('admin.equipments.index')->with('success', 'Equipment created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, Equipment $equipment): RedirectResponse
    {
        try {
            $equipment->update($request->all());

            return redirect()->route('admin.equipments.index')->with('success', 'Equipment updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
