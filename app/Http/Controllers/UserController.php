<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
    
        if ($keyword != '') {
            $users = User::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $users = User::orderBy('id')->paginate(5);
        }
        return view('pages.destinations.user.indexuser', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.destinations.user.detailuser', compact('user'));
    }

    public function create()
    {
        return view('pages.destinations.user.createuser');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create($validated);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('pages.destinations.user.edituser', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update($validated);
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }
}
