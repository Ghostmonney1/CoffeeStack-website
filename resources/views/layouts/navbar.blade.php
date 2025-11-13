<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StackCoffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

<!-- Navbar -->
<nav class="border-b border-gray-200 bg-white sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-14">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <svg class="h-6 w-6 text-amber-700" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18 8h1a3 3 0 010 6h-1v2a4 4 0 01-4 4H8a4 4 0 01-4-4V8h14zm1 4a1 1 0 000-2h-1v2h1zM6 2h2v2H6V2zm4 0h2v2h-2V2zm4 0h2v2h-2V2z"/>
                </svg>
                <span class="font-semibold text-lg text-gray-800">StackCoffee</span>
            </a>

            <!-- Desktop Links -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-black text-sm">Tags</a>
                <a href="#" class="text-gray-700 hover:text-black text-sm">Users</a>
            </div>

            <!-- Search bar -->
            <div class="hidden md:block flex-1 mx-4 max-w-sm">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search coffee wisdom..."
                        class="w-full border border-gray-300 rounded-md pl-8 pr-3 py-1.5 text-sm focus:ring-2 focus:ring-amber-600 focus:border-amber-600"
                    />
                    <svg class="absolute left-2 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/>
                    </svg>
                </div>
            </div>

            <!-- Auth Buttons -->
            @guest
                <div class="hidden md:flex items-center space-x-3">
                    <a href="../login" class="text-gray-700 text-sm px-3 py-1 rounded hover:bg-gray-100">Log in</a>
                    <a href="register" class="bg-amber-700 text-white text-sm px-3 py-1 rounded hover:bg-amber-800">Sign up</a>
                </div>
            @endguest

            @auth
                <!-- Gebruiker Dropdown -->
                <div class="hidden md:flex items-center space-x-3 relative">
                    <button id="user-btn" class="flex items-center space-x-1 text-gray-700 text-sm px-3 py-1 rounded hover:bg-gray-100 focus:outline-none">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown-menu -->
                    <div id="user-dropdown" class="absolute top-10 right-0 w-36 bg-white border border-gray-200 rounded-md shadow-lg hidden transition-all duration-150 ease-out origin-top-right">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2"
                            >
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            <!-- Mobile Menu Button -->
            <button id="menu-btn" class="md:hidden text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 bg-white">
        <div class="px-4 py-3 space-y-2">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search coffee wisdom..."
                    class="w-full border border-gray-300 rounded-md pl-8 pr-3 py-1.5 text-sm focus:ring-2 focus:ring-amber-600 focus:border-amber-600"
                />
                <svg class="absolute left-2 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/>
                </svg>
            </div>

            <a href="#" class="block text-gray-700 hover:text-black text-sm">Questions</a>
            <a href="#" class="block text-gray-700 hover:text-black text-sm">Tags</a>
            <a href="#" class="block text-gray-700 hover:text-black text-sm">Users</a>
            <hr class="my-2">
            <a href="login" class="w-full text-left text-gray-700 px-2 py-1 rounded hover:bg-gray-100">Log in</a>
            <a href="register" class="w-full text-left bg-amber-700 text-white px-2 py-1 rounded hover:bg-amber-800">Sign up</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-1 max-w-6xl mx-auto px-4">
    @yield('content')
</main>



<!-- Scripts -->
<script>
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");
    if (btn) btn.addEventListener("click", () => menu.classList.toggle("hidden"));

    const userBtn = document.getElementById("user-btn");
    const userDropdown = document.getElementById("user-dropdown");

    if (userBtn) {
        userBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!userDropdown.classList.contains("hidden")) {
                if (!userBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                    userDropdown.classList.add("hidden");
                }
            }
        });
    }
</script>

</body>
</html>

