<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(): Factory|View
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    // إنشاء مستخدم جديد
    public function create(Request $request): RedirectResponse
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');

        $user->save();

        return redirect()->back();
    }


    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }


    public function edit($id): Factory|View
    {
        $user = User::findOrFail($id);
        $users = User::all();

        return view('users', compact('user', 'users'));
    }


    public function update(Request $request): RedirectResponse
    {

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('users');
    }
}
