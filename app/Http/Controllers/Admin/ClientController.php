<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends BaseController
{
    public function index(): View
    {
        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    public function add(): View
    {
        return view('admin.clients.add');
    }

    public function edit(Client $client): View
    {
        $isEdit = true;
        return view('admin.clients.edit', compact('client', 'isEdit'));
    }

    public function show(Client $client): View
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $client = Client::create($request->all());

            return redirect()->route('admin.clients.show', $client)->with('success', 'Client created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, Client $client): RedirectResponse
    {
        try {
            $client->update($request->all());

            return redirect()->route('admin.clients.show', $client)->with('success', 'Client updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
