<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-500" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Bejelentkezés</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-white text-gray-900"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Jelszó')" />

                <x-text-input id="password"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-white text-gray-900"
                    type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Emlékezz rám') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                    {{ __('Elfelejtett jelszó?') }}
                </a>
                @endif

                <x-primary-button class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded-md">
                    {{ __('Bejelentkezés') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>