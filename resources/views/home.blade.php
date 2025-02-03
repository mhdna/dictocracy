@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="mb-4 text-lg font-semibold">
        {{ $last_week_definitions_count }} new definitions this week
    </div>

    <div>
        @if ($user_definitions)
        @endif
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @if ($definitions->count())
                    @foreach ($definitions as $definition)
                        @include('definitions.definition-card')
                        {{-- <x-definitions.definition-card :$definition /> --}}
                    @endforeach
                @else
                    <p>No terms are defined</p>
                @endif
            </div>
            <div class="mt-4 mb-40">
                {{ $definitions->links() }}
            </div>

        </div>
    </div>
@endsection
