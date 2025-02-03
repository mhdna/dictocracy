@extends('layouts.app')

@section('title', 'Term Page')

@section('content')
    <div class="flex-col space-y-6 p-6">
        @if ($definitions && count($definitions) > 0)
            <h2 class="font-extrabold text-5xl text-center">{{ $term }}</h2>
            <div class="text-center text-xl text-gray-600">{{ count($definitions) }} Definitions</div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @foreach ($definitions as $definition)
                    @include('definitions.definition-card')
                @endforeach
            </div>
        @else
            <p class="text-center text-lg text-gray-500">No terms are defined yet.</p>
        @endif
    </div>
@endsection
