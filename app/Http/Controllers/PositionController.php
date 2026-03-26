<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:positions',
        ]);

        Position::create($validatedData);

        return redirect()->route('positions.index')->with('success', 'Munkakör sikeresen létrehozva.');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $id,
        ]);

        $position = Position::findOrFail($id);
        $position->update($validatedData);

        return redirect()->route('positions.index')->with('success', 'Munkakör sikeresen frissítve.');
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Munkakör sikeresen törölve.');
    }

    public function users($id)
    {
        $position = Position::with('users')->findOrFail($id);
    
        return view('positions.users', compact('position'));
    }

}