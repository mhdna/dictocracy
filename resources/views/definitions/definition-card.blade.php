@props(['definition'])

@php
    $term = $definition->term;
@endphp

<div class="max-w-2xl mx-auto bg-yellow-800 text-white rounded-lg shadow-lg p-6 mb-8 dark:bg-blue-400">
    <div>
        @include('definitions.shared.definition')
    </div>

    <div class="flex justify-between items-center mt-6">
        @include('definitions.shared.vote')

        @include('definitions.shared.creator')
    </div>

    <div class="flex space-x-4 mt-6">
        @include('definitions.shared.share')
    </div>
</div>
