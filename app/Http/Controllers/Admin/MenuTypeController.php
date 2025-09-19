<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\MenuType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuTypeController extends BaseController
{
    public function index(): View
    {
        $menuTypes = MenuType::all();

        return view('admin.menu_types.index', compact('menuTypes'));
    }

    public function add(): View
    {
        return view('admin.menu_types.add');
    }

    public function edit(MenuType $menuType): View
    {
        $isEdit = true;
        return view('admin.menu_types.edit', compact('menuType', 'isEdit'));
    }

    public function show(MenuType $menuType): View
    {
        return view('admin.menu_types.edit', compact('menuType'));
    }

    public function store(Request $request): RedirectResponse
    {
        $menuType = MenuType::create($request->all());

        return redirect()->route('admin.menu_types.show', $menuType);
    }

    public function update(Request $request, MenuType $menuType): RedirectResponse
    {
        $menuType->update($request->all());

        return redirect()->route('admin.menu_types.show', $menuType);
    }
}
