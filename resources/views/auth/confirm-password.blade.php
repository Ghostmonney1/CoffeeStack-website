@include('layouts/navbar')

<div class="flex flex-col items-center justify-center flex-1 min-h-screen bg-gray-50 px-4 py-8">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-3">
            Confirm your password
        </h2>
        <p class="text-sm text-gray-600 text-center mb-6">
            This is a secure area of StackCoffee. Please confirm your password before continuing.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

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

            <!-- Buttons -->
            <div class="flex items-center justify-between">
                <a href="{{ url()->previous() }}"
                   class="text-sm text-amber-700 hover:text-amber-800 underline">
                    Go back
                </a>

                <button type="submit"
                        class="bg-amber-700 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-amber-800 transition-colors">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </div>
</div>

@include('layouts/footer')
