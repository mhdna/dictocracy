@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-between">
        @if ($terms)
            <div>{{ count($terms) }} Terms</div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($terms as $term)
                    <x-term-card :term="$term->term" />
                @endforeach
            </div>
        @else
            <p>No terms are defined</p>
        @endif
    </div>
    </div>
@endsection
