@props(['definition'])

@php
    $term = $definition->term;
@endphp

<div
    class="mx-auto h-[400px] w-[450px] dark:text-white text-black rounded-lg shadow-lg p-6 mb-8 border dark:border-white border-black group hover:bg-gray-200  dark:hover:bg-red-950 transition-all duration-300 flex flex-col">

    <!-- Main content (takes available space) -->
    <div class="flex-1">
        @include('definitions.shared.definition')
    </div>

    <!-- Pushes to bottom -->
    <div class="mt-auto">
        <div class="flex justify-between items-center">
            @include('definitions.shared.vote')
            @include('definitions.shared.creator')
        </div>

        <div class="flex space-x-4 mt-6">
            @include('definitions.shared.share')
        </div>
    </div>
</div>
