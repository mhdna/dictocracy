<header class="mx-20 mt-10 flex flex-col">
    <nav class="relative flex items-center justify-between">
        <!-- Left Side Links -->
        <div class="flex space-x-6">
            <a href="#">Language</a>
            <a href="#">Browse</a>
            <a href="#">Dialects</a>
            @auth
                <a href="{{ route('definitions.create') }}">Add term</a>
            @endauth
        </div>

        <!-- Centered Title -->
        <a class="absolute left-1/2 -translate-x-1/2 font-sageland text-5xl text-red-700 dark:text-blue-200 bg-blue-200 dark:bg-red-700 px-4 py-2 rounded-lg"
            href="/">Dictocracy</a>

        <!-- Right Side (Theme Toggle, Profile, Auth Links) -->
        <div class="flex items-center space-x-4">
            <!-- Theme Toggle -->
            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>

            @auth
                <!-- Profile Image -->
                <a href="{{ route('account') }}">
                    <img src="https://placehold.co/40x40" class="rounded-full" alt="Profile">
                </a>

                <!-- Logout -->
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-800">Log out</button>
                </form>
            @endauth

            @guest
                <a href="/register" class="text-blue-500 hover:text-blue-700">Register</a>
                <a href="/login" class="text-blue-500 hover:text-blue-700">Log In</a>
            @endguest
        </div>
    </nav>

    <!-- Letters Navigator -->
    <div class="flex items-center mt-8 mx-20">
        <x-letters-navigator />
    </div>

    <!-- Search Box -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <form action="{{ route('search') }}" method="GET" class="mt-2">
                    <input class="typeahead form-control bg-yellow-300 text-black rounded-lg px-3 py-2" id="search"
                        name="query" type="text" placeholder="Search...">
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
