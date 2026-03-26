@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">

    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
        {{ session('error') }}
    </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">Dolgozók listája</h1>

    <!-- @if(auth()->user() && auth()->user()->admin)
        <a href="{{ route('users.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md mb-4 inline-block">
            Új dolgozó
        </a>
    @endif -->


    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-collapse border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-300">
                    <th class="py-3 px-4 text-left font-medium text-gray-600">ID</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Név</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Email</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Telefonszám</th>
                    @if(auth()->user() && auth()->user()->admin)
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Műveletek</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $user->id }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->phone_number }}</td>
                    @if(auth()->user() && auth()->user()->admin)
                    <td class="py-2 px-4 space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-md text-sm">
                            Szerkesztés
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md text-sm"
                                onclick="return confirm('Biztosan törlöd?')">Törlés</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection