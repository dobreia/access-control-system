<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Adminisztrációs Rendszer' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Navigációs menüsor -->
    <nav class="bg-blue-500 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex space-x-4">
                <a href="{{ route('users.index') }}" class="hover:underline">Dolgozók</a>
                <a href="{{ route('positions.index') }}" class="hover:underline">Munkakörök</a>
                <a href="{{ route('rooms.index') }}" class="hover:underline">Szobák</a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                <span>Üdvözlünk, <span class="font-bold">{{ Auth::user()->name }}</span>!</span>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-xl font-bold hover:text-gray-200">Kijelentkezés</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Bejelentkezés</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Tartalom -->
    <main class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        @yield('content')
    </main>

</body>

</html>