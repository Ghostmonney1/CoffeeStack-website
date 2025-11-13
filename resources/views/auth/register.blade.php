@include('layouts/navbar')

<div class="min-h-screen flex flex-col justify-between bg-white">
    <div class="flex-grow">
        <div class="max-w-md mx-auto mt-16 mb-20 bg-amber-50 border border-amber-200 rounded-xl shadow p-8">
            <h1 class="text-3xl font-bold text-center text-amber-900 mb-8">Join StackCoffee ☕</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-amber-900" />
                    <x-text-input id="name" class="block mt-1 w-full border-amber-300 focus:border-amber-700 focus:ring-amber-700 rounded-md"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-amber-900" />
                    <x-text-input id="email" class="block mt-1 w-full border-amber-300 focus:border-amber-700 focus:ring-amber-700 rounded-md"
                                  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-amber-900" />
                    <x-text-input id="password" class="block mt-1 w-full border-amber-300 focus:border-amber-700 focus:ring-amber-700 rounded-md"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-amber-900" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-amber-300 focus:border-amber-700 focus:ring-amber-700 rounded-md"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-amber-700 hover:text-amber-900 underline"
                       href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <!-- ✅ Custom StackCoffee-styled button -->
                    <button
                        type="submit"
                        class="bg-white border border-amber-700 text-amber-700 hover:bg-amber-700 hover:text-white focus:ring-2 focus:ring-amber-700 px-5 py-2 rounded-md transition duration-200 ease-in-out">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts/footer')
</div>
