@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Szoba módosítása</h1>

    <form method="POST" action="{{ route('rooms.update', $room->id) }}">
        @csrf
        @method('PUT')


        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Szoba neve</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                value="{{ old('name', $room->name) }}">
            @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Leírás</label>
            <textarea name="description" id="description"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $room->description) }}</textarea>
            @error('description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="image_path" class="block text-sm font-medium text-gray-700">Kép elérési útvonala</label>
            <input type="text" name="image_path" id="image_path"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                value="{{ old('image_path', $room->image_path) }}">
            @error('image_path')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Mentés
        </button>
    </form>
</div>
@endsection