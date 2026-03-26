<x-guest-layout>
    <x-slot name="title">Főoldal</x-slot>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1 class="text-4xl font-bold text-blue-600 mb-6">Üdvözöllek a Beléptető Rendszer Adminisztrációs Felületén!
        </h1>
        <p class="text-lg text-gray-700 mb-8 text-center">
            Ez a rendszer lehetőséget nyújt a dolgozók és szobák kezelésére, valamint belépési jogok adminisztrálására.
        </p>
        <div class="bg-white shadow-lg rounded-lg p-6 w-3/4 md:w-1/2">
            <h2 class="text-2xl font-semibold mb-4 text-blue-500">Statisztikák</h2>
            <p class="text-gray-800 mb-2"><strong>Létrehozott szobák száma:</strong> {{ $roomCount }}</p>
            <p class="text-gray-800"><strong>Kezelt dolgozók száma:</strong> {{ $userCount }}</p>
        </div>
    </div>

</x-guest-layout>