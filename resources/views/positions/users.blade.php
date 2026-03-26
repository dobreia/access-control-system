@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Dolgozók a(z) "{{ $position->name }}" munkakörben</h1>

    @if ($position->users->isEmpty())
    <p class="text-gray-700">Nincsenek dolgozók ebben a munkakörben.</p>
    @else
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-700">Név</th>
                <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-700">Telefonszám
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($position->users as $user)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $user->name }}</td>
                <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $user->phone_number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <a href="{{ route('positions.index') }}"
        class="mt-6 inline-block bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium py-2 px-4 rounded shadow">
        Vissza a munkakörökhöz
    </a>
</div>
@endsection