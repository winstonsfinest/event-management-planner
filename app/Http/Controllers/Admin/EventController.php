<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\Client;
use App\Models\Event;
use App\Models\Staff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends BaseController
{
    public function index(): View
    {
        $events = Event::all();

        return view('admin.events.index', compact('events'));
    }

    public function add(): View
    {
        return view('admin.events.add');

        $clients = Client::all();
        $staffs = Staff::all();

        return view('admin.events.add', compact('clients', 'staffs'));
    }

    public function edit(Event $event): View
    {
        $event->load([
            'client',
            'location',
            'staffs',
            'menu_items',
            'equipments'
        ]);
        $isEdit = true;
        return view('admin.events.edit', compact('event', 'isEdit'));
    }

    public function show(Event $event): View
    {
        $event->load([
            'client',
            'location',
            'staffs',
            'menu_items',
            'equipments'
        ]);

        return view('admin.events.edit', compact('event'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $event = Event::create($request->all());

            $staffIds = $request->get('staff_ids');
            if($staffIds) {
                $event->staffs()->attach($staffIds);
            }

            $menuItemIds = $request->get('menu_item_ids');
            if($menuItemIds) {
                $event->menu_items()->attach($menuItemIds);
            }

            $equipmentIds = $request->get('equipment_ids');
            if($equipmentIds) {
                $event->equipments()->attach($equipmentIds);
            }

            return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        try {
            $event->update($request->all());

            $staffIds = $request->get('staff_ids');
            if($staffIds) {
                $event->staffs()->sync($staffIds);
            }

            $menuItemIds = $request->get('menu_item_ids');
            if($menuItemIds) {
                $event->menu_items()->sync($menuItemIds);
            }

            $equipmentIds = $request->get('equipment_ids');
            if($equipmentIds) {
                $event->equipments()->sync($equipmentIds);
            }

            return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function delete(Event $event): JsonResponse
    {
        $event->delete();
        return response()->json(['success' => true]);
    }
}
