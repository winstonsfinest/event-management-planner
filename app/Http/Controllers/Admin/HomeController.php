<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends BaseController
{
    public function index(): RedirectResponse
    {
        return redirect()->route('admin.events.index');
    }

    public function login(): View
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        if (User::count() == 0) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin',
                'password' => bcrypt('admin')
            ]);
        }

        $user = User::where('email', request('email'))->first();

        if (!$user) {
            return redirect()->route('login')->with([
                'error' => 'Invalid email or password',
                'old' => $request->only(['email'])
            ]);
        }

        if ($user->email == $request->get('email') && \Hash::check($request->get('password'), $user->password)) {
            Auth::login($user);
            return redirect()->route('admin.index');
        }

        return redirect()->route('login')->with([
            'error' => 'Invalid email or password',
            'old' => $request->only(['email'])
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
