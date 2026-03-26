<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Kezdőlap' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="{{ route('home') }}" class="text-xl font-bold hover:text-gray-200">Főoldal</a>
            <div class="flex space-x-4">
                @guest
                <a href="{{ route('login') }}" class="hover:text-gray-200">Bejelentkezés</a>
                @else
                <a href="{{ route('dashboard') }}" class="hover:text-gray-200">Vezérlőpult</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-gray-200">Kijelentkezés</button>
                </form>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 px-4">
        {{ $slot }}
    </main>


</body>

</html>