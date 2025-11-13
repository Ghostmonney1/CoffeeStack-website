@include('layouts/navbar')

<div class="min-h-screen flex flex-col justify-between bg-white">
    <div class="flex-grow max-w-6xl mx-auto px-4 py-20">
        <!-- Hero Section -->
        <div class="text-center mb-20">
            <h1 class="text-4xl font-bold text-amber-900 mb-6">Welcome to StackCoffee ☕</h1>
            <p class="text-gray-700 text-lg mb-8">The place where coffee lovers ask, answer & share brew wisdom.</p>
            <div class="mt-8 space-x-4">
                <a href="#" class="bg-amber-700 text-white px-6 py-3 rounded hover:bg-amber-800 transition">Browse Questions</a>
                <a href="#" class="border border-amber-700 text-amber-700 px-6 py-3 rounded hover:bg-amber-50 transition">Ask a Question</a>
            </div>
        </div>

        <!-- Featured Questions / Topics -->
        <div class="grid md:grid-cols-3 gap-10 mb-20">
            <a href="{{ route('topic', ['slug' => 'espresso']) }}" class="block bg-amber-800 p-6 rounded-xl shadow hover:shadow-lg hover:bg-amber-900 transition">
                <h2 class="text-xl font-semibold mb-3 text-white">How to brew the perfect espresso?</h2>
                <p class="text-amber-100 text-sm mb-4">Share your tips and tricks for the perfect shot of espresso at home.</p>
                <span class="text-amber-200 text-sm font-medium hover:underline">Read more →</span>
            </a>
            <a href="{{ route('topic', ['slug' => 'cold-brew']) }}" class="block bg-amber-800 p-6 rounded-xl shadow hover:shadow-lg hover:bg-amber-900 transition">
                <h2 class="text-xl font-semibold mb-3 text-white">Best coffee beans for cold brew?</h2>
                <p class="text-amber-100 text-sm mb-4">Looking for recommendations for beans that taste amazing in cold brew.</p>
                <span class="text-amber-200 text-sm font-medium hover:underline">Read more →</span>
            </a>
            <a href="{{ route('topic', ['slug' => 'cleaning-espresso']) }}" class="block bg-amber-800 p-6 rounded-xl shadow hover:shadow-lg hover:bg-amber-900 transition">
                <h2 class="text-xl font-semibold mb-3 text-white">Cleaning your espresso machine</h2>
                <p class="text-amber-100 text-sm mb-4">How often should you descale and clean your espresso machine?</p>
                <span class="text-amber-200 text-sm font-medium hover:underline">Read more →</span>
            </a>
        </div>

        <!-- Call to Action -->
        <div class="text-center mb-12">
            <h2 class="text-2xl font-semibold mb-4 text-amber-900">Join our Coffee Community</h2>
            <p class="text-gray-700 mb-8">Sign up today and start asking questions, sharing knowledge, and enjoying the coffee culture!</p>
            <a href="#" class="bg-amber-700 text-white px-6 py-3 rounded hover:bg-amber-800 transition">Get Started</a>
        </div>
    </div>

    @include('layouts/footer')
</div>
