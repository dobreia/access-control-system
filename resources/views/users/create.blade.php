@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Új felhasználó létrehozása</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf


        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('name') }}" required>
            @error('name')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('email') }}">
            @error('email')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Jelszó</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('password')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Telefonszám</label>
            <input type="text" name="phone_number" id="phone_number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('phone_number') }}">
            @error('phone_number')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="card_number" class="block text-sm font-medium text-gray-700">Kártyaszám</label>
            <input type="text" name="card_number" id="card_number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('card_number') }}">
            @error('card_number')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="position_id" class="block text-sm font-medium text-gray-700">Pozíció</label>
            <select name="position_id" id="position_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach($positions as $position)
                <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                    {{ $position->name }}
                </option>
                @endforeach
            </select>
            @error('position_id')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Mentés</button>
    </form>
</div>
@endsection