<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}



    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data = $request->except(['password']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
                        ->with('success', 'User updated successfully.');
    }



    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully.');
    }

}



