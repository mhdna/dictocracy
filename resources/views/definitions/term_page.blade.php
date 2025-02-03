@extends('layouts.app')

@section('title', 'Term Page')

@section('content')
    @include('partials.navbar')

    <div class="flex flex-col space-y-6 p-6">
        @if ($definitions && count($definitions) > 0)
            <h2 class="font-extrabold text-5xl text-center">{{ $term }}</h2>
            <div class="text-center text-xl text-gray-600">{{ count($definitions) }} Definitions</div>

            @foreach ($definitions as $definition)
                <div class="bg-white shadow-md rounded-lg p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <a class="text-yellow-600 font-semibold" />
                        Author: {{ $definition->user->name }}
                        </a>
                    </div>

                    @if ($definition->dialects && count($definition->dialects) > 0)
                        <div class="space-y-2">
                            @foreach ($definition->dialects as $dialect)
                                <p class="bg-red-600 text-white rounded-full px-3 py-1 inline-block">
                                    Dialect: {{ $dialect->name }}
                                </p>
                            @endforeach
                        </div>
                    @endif

                    @include('definitions.definition-card')
                </div>
            @endforeach
        @else
            <p class="text-center text-lg text-gray-500">No terms are defined yet.</p>
        @endif
    </div>
@endsection
