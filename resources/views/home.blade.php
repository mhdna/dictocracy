@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    @include('partials.navbar')

    <div class="mb-4 text-lg font-semibold">
        {{ $last_week_definitions_count }} new definitions this week
    </div>

    <div class="flex space-x-6">

        <div class="w-2/3">
            <div class="grid grid-cols-2 gap-4">
                @if ($definitions->count())
                    @foreach ($definitions as $definition)
                        @include('definitions.definition-card')
                        {{-- <x-definitions.definition-card :$definition /> --}}
                    @endforeach
                @else
                    <p>No terms are defined</p>
                @endif
            </div>

        </div>
        @if ($user_definitions)
            <div class="w-1/3">
                @include('partials.sidebar')
            </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="mt-4 mb-40">
        {{ $definitions->links() }}
    </div>
@endsection
