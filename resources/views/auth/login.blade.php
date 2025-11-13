@include('layouts/navbar')

<div class="flex flex-col items-center justify-center flex-1 min-h-screen bg-gray-50 px-4 py-8">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            Welcome back to <span class="text-amber-700">StackCoffee</span>
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username"
                    class="block w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                <x-text-input
                    id="password"
                    type="password"
                    name="password"
                    required autocomplete="current-password"
                    class="block w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-amber-700 focus:ring-amber-600"
                       name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-amber-700 hover:text-amber-800 underline">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit"
                        class="bg-amber-700 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-amber-800 transition-colors">
                    {{ __('Log in') }}
                </button>
            </div>

            <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-gray-300">
                <span class="px-2 text-gray-400 text-sm">or</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Sign Up Link -->
            <p class="text-center text-sm text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-amber-700 hover:text-amber-800 font-medium">
                    Sign up
                </a>
            </p>
        </form>
    </div>
</div>

@include('layouts/footer')
