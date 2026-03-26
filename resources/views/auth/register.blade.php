<x-guest-layout>
    <form method="POST" action="{{ route('register') }}"
        class="space-y-6 bg-white p-8 rounded-lg shadow-md w-full max-w-md mx-auto">
        @csrf

        <!-- Név -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jelszó -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Jelszó</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jelszó megerősítése -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Jelszó
                megerősítése</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('password_confirmation')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Műveletek -->
        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                Már van fiókod? Jelentkezz be!
            </a>
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Regisztráció
            </button>
        </div>
    </form>
</x-guest-layout>