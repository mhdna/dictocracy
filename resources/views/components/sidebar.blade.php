{{-- TODO I have duplication for $defintion->term --}}
@props(['user_definitions'])

<div class="max-w-[439px] flex flex-col mb-5 4">
    @auth
        <div class="bg-yellow-800 rounded-full px-12 py">
            <div>
                Your Terms:
            </div>
            @foreach ($user_definitions as $definition)
                <div>{{ $definition->term->term }}</div>
            @endforeach
        </div>


        <div class="bg-yellow-800 rounded-full px-12 py">
            <div>Your terms Activity:</div>
            <div>Graph here <a href="https://apexcharts.com/docs/chart-types/line-chart/">Line Chart</a></div>
        </div>
    @endauth
</div>
