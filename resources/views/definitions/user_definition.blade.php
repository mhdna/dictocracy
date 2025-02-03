@extends('layouts.app')

@section('title', 'User definition')

@props(['definition'])

@section('content')
    <div class="flex flex-col space-y-6 p-6">
        @if ($definition)
            <div class="flex flex-col items-center justify-center text-center">
                <div class="flex flex-col items-center space-y-4">
                    <h2 class="font-extrabold text-5xl">{{ $term }}</h2>

                    @if ($definition->is_approved)
                        <span class="bg-green-500 text-lg dark:bg-green-600 dark:text-black py-2 px-4 rounded-full">
                            Approved
                        </span>
                    @else
                        <span class="bg-red-500 text-lg dark:bg-pink-600 py-2 px-4 rounded-full">
                            Awaiting approval
                        </span>
                    @endif
                </div>

                @include('definitions.shared.edit-delete-form')
            </div>

            <div class="flex flex-col items-center text-2xl max-w-[800px] mx-auto mt-10">
                <div>
                    <div class="mb-10 mt-10">
                        {{ $definition->definition }}
                    </div>

                    <div class="italic text-gray-500">
                        {{ $definition->example }}
                    </div>
                </div>
            </div>
    </div>
@else
    <p class="text-center text-lg text-gray-500">No terms are defined yet.</p>
    @endif
    </div>
@endsection
