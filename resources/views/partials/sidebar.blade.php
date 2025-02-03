@props(['user_definitions'])

<div class="h-1 flex flex-col mb-5">
    @auth
        <div class="text-black dark:text-white border-red-700 border-2 rounded-lg px-6 py-4 mb-5 shadow-md">
            <div class="font-bold text-xl">Your Recent Terms:
            </div>
            @if ($user_definitions)
                @foreach ($user_definitions as $definition)
                    <span><a class="text-blue-800" href="{{ route('userTerm', ['term' => $definition->term->term]) }}">
                            {{ '- ' . $definition->term->term }}
                        </a>
                    </span>
                @endforeach
            @endif
        </div>
    @endauth
</div>
