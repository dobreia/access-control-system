<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('users.index')->with('error', 'Nincs jogosultságod felhasználót létrehozni.');
        }

        $positions = \App\Models\Position::all();
        return view('users.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string',
            'card_number' => 'required|string|size:16',
            'position_id' => 'required|exists:positions,id',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'phone_number' => $validatedData['phone_number'],
            'card_number' => $validatedData['card_number'],
            'position_id' => $validatedData['position_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'Felhasználó sikeresen létrehozva.');
    }

    public function edit(User $user)
    {
        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('users.index')->with('error', 'Nincs jogosultságod a művelethez.');
        }

        $positions = \App\Models\Position::all();
        return view('users.edit', compact('user', 'positions'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('users.index')->with('error', 'Nincs jogosultságod a művelethez.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'required|string',
            'card_number' => 'required|string|size:16',
            'position_id' => 'required|exists:positions,id',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'phone_number' => $validatedData['phone_number'],
            'card_number' => $validatedData['card_number'],
            'position_id' => $validatedData['position_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'Felhasználó sikeresen módosítva.');
    }

    public function destroy($id)
    {
        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('users.index')->with('error', 'Nincs jogosultságod a felhasználó törléséhez.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Felhasználó sikeresen törölve.');
    }
}