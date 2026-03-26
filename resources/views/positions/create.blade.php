@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Új munkakör létrehozása</h1>

    <form method="POST" action="{{ route('positions.store') }}" class="space-y-4">
        @csrf


        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Munkakör neve</label>
            <input type="text" name="name" id="name"
                class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('name') }}">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded shadow">
            Mentés
        </button>
    </form>
</div>
@endsection