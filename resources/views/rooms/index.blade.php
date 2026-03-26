@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Szobák listája</h1>

    <!-- Új szoba hozzáadása gomb -->
    @if(auth()->user() && auth()->user()->admin)
    <a href="{{ route('rooms.create') }}"
        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600">
        Új szoba
    </a>
    @endif


    <table class="w-full table-auto border-collapse border border-gray-300 rounded-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Név</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Leírás</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $room->id }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $room->name }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $room->description }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('rooms.edit', $room->id) }}"
                        class="inline-block mb-2 px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded hover:bg-yellow-600">
                        Szerkesztés
                    </a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-block px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600"
                            onclick="return confirm('Biztosan törlöd?')">
                            Törlés
                        </button>
                    </form>
                    @if(auth()->user() && auth()->user()->admin)
                    <form action="{{ route('rooms.entries', $room->id) }}" method="GET" style="display:inline;">
                        <button type="submit"
                            class="inline-block px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600">
                            Belépések
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection