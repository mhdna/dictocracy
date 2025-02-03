<header class="mx-20 mt-10 flex flex-col">
    <nav class="relative flex items-center justify-between">
        <div class="flex space-x-6">
            @auth
                <a href="{{ route('userDefinitions') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                    <i class="fa-solid fa-book"></i> My Definitions
                </a>
                <a href="{{ route('definitions.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                    <i class="fas fa-plus"></i> Add Term
                </a>
            @endauth
        </div>

        <a class="absolute left-1/2 -translate-x-1/2 font-sageland text-7xl text-red-700 dark:text-blue-200 bg-blue-200 dark:bg-red-700 px-4 py-2 rounded-lg"
            href="{{ route('home') }}">Dictocracy</a>

        <div class="flex items-center space-x-4">
            @include('partials.language-switch')
            @include('partials.theme-switch')
            @auth
                <a href="{{ route('account') }}">
                    <img src="https://placehold.co/40x40" class="rounded-full" alt="Profile">
                </a>

                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-800">Log out</button>
            </form> @endauth
            @guest
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Register</a>
            <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Log In</a> @endguest
        </div>
    </nav>
</header>
