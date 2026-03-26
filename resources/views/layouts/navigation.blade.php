<!-- resources/views/layouts/navigation.blade.php -->

<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">Főoldal</a>
        @auth
        <span>Üdvözlünk, {{ Auth::user()->name }}!</span>
        <a href="{{ route('logout') }}">Kijelentkezés</a>
        @else
        <a href="{{ route('login') }}">Bejelentkezés</a>
        @endauth
    </div>
</nav>