<@include('layouts/navbar')

<div class="flex flex-col items-center justify-center flex-1 min-h-screen bg-gray-50 px-4 py-8">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-3">
            Reset your password
        </h2>
        <p class="text-sm text-gray-600 text-center mb-6">
            Enter your new password below to secure your StackCoffee account.
        </p>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email', $request->email)"
                    required autofocus autocomplete="username"
                    class="block w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('New Password')" class="text-gray-700" />
                <x-text-input
                    id="password"
                    type="password"
                    name="password"
                    required autocomplete="new-password"
                    class="block w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700" />
                <x-text-input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password"
                    class="block w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-amber-700 hover:text-amber-800 underline">
                    Back to login
                </a>

                <button type="submit"
                        class="bg-amber-700 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-amber-800 transition-colors">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>

@include('layouts/footer')
