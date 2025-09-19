<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Event;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends BaseController
{
    public function index(): View
    {
        $staffs = Staff::all();

        return view('admin.staffs.index', compact('staffs'));
    }

    public function add(): View
    {
        return view('admin.staffs.add');
    }

    public function edit(Staff $staff): View
    {
        $isEdit = true;
        return view('admin.staffs.edit', compact('staff', 'isEdit'));
    }

    public function show(Staff $staff): View
    {
        return view('admin.staffs.edit', compact('staff'));
    }

    public function store(Request $request): RedirectResponse
    {
        $staff = Staff::create($request->all());

        return redirect()->route('admin.staffs.show', $staff);
    }

    public function update(Request $request, Staff $staff): RedirectResponse
    {
        $staff->update($request->all());

        return redirect()->route('admin.staffs.show', $staff);
    }
}
