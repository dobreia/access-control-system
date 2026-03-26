<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('rooms.index')->with('error', 'Nincs jogosultságod szobát létrehozni.');
        }

        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:255|unique:rooms',
            'description' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
        ]);

        Room::create($validatedData);

        return redirect()->route('rooms.index')->with('success', 'Szoba sikeresen létrehozva.');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('rooms.index')->with('error', 'Nincs jogosultságod a szoba módosítására.');
        }

        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:255|unique:rooms,name,' . $id,
            'description' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
        ]);

        $room = Room::findOrFail($id);
        $room->update($validatedData);

        return redirect()->route('rooms.index')->with('success', 'Szoba sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
    
        if (auth()->check() && !auth()->user()->admin) {
            return redirect()->route('rooms.index')->with('error', 'Nincs jogosultságod a szoba törléséhez.');
        }
    
        $room->delete();
    
        return redirect()->route('rooms.index')->with('success', 'Szoba sikeresen törölve.');
    }
    
    public function entries($id)
    {
        $room = Room::findOrFail($id);
        $entries = $room->entries()
            ->with(['user.position'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('rooms.entries', compact('room', 'entries'));
    }


}