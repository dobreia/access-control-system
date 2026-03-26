@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Belépési történet - {{ $room->name }}</h1>

    @if ($entries->count() > 0)
    <table class="w-full table-auto border-collapse border border-gray-300 rounded-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Dátum</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Dolgozó neve
                </th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Telefonszám
                </th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Munkakör</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Belépés
                    sikeressége</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                    {{ $entry->created_at->format('Y-m-d H:i:s') }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $entry->user->name }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $entry->user->phone_number }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $entry->user->position->name }}
                </td>
                <td
                    class="border border-gray-300 px-4 py-2 text-sm font-medium {{ $entry->successful ? 'text-green-600' : 'text-red-600' }}">
                    {{ $entry->successful ? 'Sikeres' : 'Sikertelen' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $entries->links('pagination::tailwind') }}
    </div>
    @else
    <p class="text-gray-600">Nincs belépési adat ehhez a szobához.</p>
    @endif

    <a href="{{ route('rooms.index') }}"
        class="inline-block mt-4 px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded hover:bg-gray-600">
        Vissza a szobákhoz
    </a>
</div>
@endsection