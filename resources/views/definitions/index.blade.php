{{-- TODO: Super confusing mix between under_definition and defintions --}}
<x-layout>
    <div class="flex flex-col justify-between">
        @if ($terms)
            <div>{{ count($terms) }} Terms</div>
            @foreach ($terms as $term)
                {{-- <a href="/term/{{ $term->term }}"> --}}
                <x-term-card :term="$term->term" />
                {{-- </a> --}}
            @endforeach
        @else
            <p>No terms are defined</p>
        @endif
    </div>
    </div>
</x-layout>
