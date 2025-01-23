{{-- TODO: Super confusing mix between under_definition and defintions --}}
<x-layout>
    <div class="flex flex-col justify-between">
        @if ($definitions)
            <h2 class="font-extrabold text-5xl">{{ $term }}</h2>
            <div>{{ count($definitions) }} Definitions</div>
            @foreach ($definitions as $definition)
                <a class="bg-yellow-300 text-black" href="/profile/{{ $definition->user->id }}">Author:
                    {{ $definition->user->name }}</a>
                @if ($definition->dialects)
                    @foreach ($definition->dialects as $dialect)
                        <p class="bg-red-600 text-black">Dialects: {{ $dialect->name }}</p>
                    @endforeach
                @endif
                <x-term-card :term="$definition->definition" />
            @endforeach
        @else
            <p>No terms are defined</p>
        @endif
    </div>
    </div>
</x-layout>
