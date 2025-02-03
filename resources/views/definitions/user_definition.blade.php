@extends('layouts.app')

@section('title', 'User definition')

@props(['definition'])

{{-- TODO Make it more beautiful --}}

@section('content')
    @include('partials.navbar')

    <div class="flex flex-col space-y-6 p-6">
        @if ($definition)
            <h2 class="font-extrabold text-5xl text-center">{{ $term }}</h2>

            <div class="shadow-md rounded-lg p-4 space-y-3">
                <div>
                    Definition: {{ $definition->definition }}
                </div>

                <div>
                    Example: {{ $definition->example }}
                </div>

                @if ($definition->is_approved)
                    <div>
                        Approved
                    </div>
                @else
                    <div>
                        Needs approval
                    </div>
                @endif

                <div class="max-w-2xl mx-auto bg-yellow-800 text-white rounded-lg shadow-lg p-6 mb-8 dark:bg-blue-400">
                    <div class="flex space-x-4 mt-6">
                        @include('definitions.shared.share')
                    </div>
                </div>
            </div>
        @else
            <p class="text-center text-lg text-gray-500">No terms are defined yet.</p>
        @endif
    </div>
@endsection
