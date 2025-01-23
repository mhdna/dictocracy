{{-- TODO fix attempt to read property (e.g. logo) on null --}}

@props(['definition'])

@php
    $term = $definition->word;
@endphp

<div class="max-w-[639px] flex flex-col mb-5 bg-yellow-800 rounded-full px-12 py-4 dark:bg-blue-400">
    <!-- max-h-[667px] -->
    <div>
        <h2>{{ $term->word }}</h2>
        <div>Onzul lee creative</div>
        {{-- Only show dialects for Arabic --}}
        @if ($term->language->name === 'ar')
            <div>
                <span>Phrase in:</span>
                <span>Dailect 1</span>
                <span>Dailect 2</span>
            </div>
        @endif

        <div>
            {{ $definition->definition }}
        </div>

        <div>
            {{ $definition->example }}
        </div>
    </div>

    <div class="flex justify-between">
        <div class="flex justify-between">
            <div>Upvotes: {{ $definition->upvotes }}</div>
            <div>Downvotes: {{ $definition->downvotes }}</div>
        </div>

        <div class="flex justify-between">
            <div>Facebook</div>
            <div>Instagram</div>
        </div>


        <div>
            Created by:
            <img src="{{ $definition->user->logo }}" alt="User Logo">
            {{ $definition->user->name }}
        </div>
    </div>
</div>
