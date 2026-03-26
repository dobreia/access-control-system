@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Pozíciók</h1>

    <a href="{{ route('positions.create') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded shadow mb-6">
        Új pozíció
    </a>

    @if ($positions->isEmpty())
    <p class="text-gray-700">Nincsenek pozíciók a rendszerben.</p>
    @else
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-700">ID</th>
                <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-700">Név</th>
                <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-700">Műveletek</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($positions as $position)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $position->id }}</td>
                <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $position->name }}</td>
                <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700 flex space-x-2">
                    <a href="{{ route('positions.edit', $position->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded shadow">
                        Szerkesztés
                    </a>
                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-medium py-1 px-3 rounded shadow"
                            onclick="return confirm('Biztosan törlöd?')">
                            Törlés
                        </button>
                    </form>
                    <form action="{{ route('positions.users', $position->id) }}" method="GET" style="display:inline;">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded shadow">
                            Dolgozók
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection