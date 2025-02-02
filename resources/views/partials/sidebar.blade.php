@props(['user_definitions'])

@php
    $i = 1;
@endphp

<div class="max-w-[439px] flex flex-col mb-5">
    @auth
        <div class="bg-yellow-800 rounded-lg px-6 py-4 mb-5 shadow-md">
            <h3 class="text-lg font-semibold text-white mb-2">Your Terms:</h3>
            <div class="space-y-2 text-white">
                @foreach ($user_definitions as $definition)
                    <div class="text-sm">{{ $i++ . '- ' . $definition->term->term }}</div>
                @endforeach
            </div>
        </div>

        <div class="border border-white rounded-lg py-4 px-6">
            <h3 class="text-lg font-semibold text-white mb-3">Your Terms Activity:</h3>
            <div class="max-w-[650px] mx-auto dark:text-black" id="chart">
            </div>
        </div>
    @endauth
</div>
