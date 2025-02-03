@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-between">
        <h2 class="font-extrabold text-5xl">Search term: {{ $query }}</h2>
        <div>{{ count($terms) }} Terms found</div>
        @if ($terms)
            @foreach ($terms as $term)
                <x-term-card :term="$term->term" />
            @endforeach
        @else
            <p>No results are found</p>
        @endif
    </div>
    </div>
@endsection
