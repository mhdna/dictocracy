@extends('layouts.app')

@section('content')
    @include('partials.navbar')

    <div class="flex flex-col justify-between">
        @if ($definitions)
            <div>{{ count($definitions) }} definitions</div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($definitions as $definition)
                    <x-term-card :term="$definition->term->term" />
                    {{ $definition->definition }}
                @endforeach
            </div>
        @else
            <p>No terms are defined</p>
            {{-- TODO "add new term" button --}}
        @endif
    </div>
    </div>
@endsection
