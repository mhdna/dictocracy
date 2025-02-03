<header class="mx-20 mt-10">
    <nav class="flex items-center justify-between">
        <a class="font-title text-5xl text-red-800 hover:text-red-500 dark:hover:text-red-600 px-4 py-2 transition-colors duration-300"
            href="{{ route('home') }}">Dictocracy</a>

        <div class="flex items-center justify-center w-full">
            <div class="w-full flex justify-center lg:block hidden">
                @include('partials.letters-navigator')

            </div>
        </div>

        <div class="flex items-center space-x-4">
            @include('partials.theme-switch')
            @auth
                <div class="flex items-center justify-center text-black dark:text-white">
                    <i class="fa-solid fa-user"></i>
                    <span class="ml-2">{{ auth()->user()->name }}</span>
                </div>
                <div class="flex-col">

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button
                            class="bg-black dark:bg-black text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors duration-300">
                            Log out
                        </button>
                    </form>
                @endauth
                @guest
                    <div class="flex gap-2">
                        <a href="{{ route('register') }}"
                            class="bg-black dark:bg-black text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors duration-300">Register</a>
                        <a href="{{ route('login') }}"
                            class="bg-black dark:bg-black text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors duration-300">
                            Log In</a>
                    </div>
                @endguest
            </div>
    </nav>

    @auth
        <div class="flex justify-center mt-1">
            @include('partials.navbar')
        </div>
    @endauth

    <div class="flex-col justify-center">
        <div class="w-full">
            @include('partials.searchbox')
        </div>
        {{-- <div class="max-w-[1000px] mb-32 lg:mx-56"> --}}
        {{--     @include('partials.recent-words') --}}
        {{-- </div> --}}
    </div>
</header>
