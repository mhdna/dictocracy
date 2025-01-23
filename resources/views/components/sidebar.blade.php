{{-- TODO I have duplication for $defintion->term --}}
@props(['user_definitions'])

@php
    $i = 1;
@endphp

<div class="max-w-[439px] flex flex-col mb-5 4">
    @auth
        <div class="bg-yellow-800 rounded-full px-12 py">
            <div>
                Your Terms:
            </div>
            @foreach ($user_definitions as $definition)
                <div>{{ $i++ . '- ' . $definition->term->term }}</div>
            @endforeach
        </div>


        <div class="border border-white rounded-full py-0 px-0 mt-5">
            <div>Your terms Activity:</div>
            <div class="max-w-[650px] m-[35px] dark:text-black" id="chart">
            </div>
        </div>
    @endauth
</div>
