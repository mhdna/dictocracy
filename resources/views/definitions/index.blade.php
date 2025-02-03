@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center">
        @if ($terms)
            <span class="mb-10 bg-yellow-500 text-xl font-bold text-black">{{ count($terms) }} Terms</span>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($terms as $term)
                    <x-term-card :term="$term->term" class="text-2xl text-red-600 text-bold " />
                @endforeach
            </div>
        @else
            <p>No terms are defined</p>
        @endif
    </div>
    </div>
@endsection
