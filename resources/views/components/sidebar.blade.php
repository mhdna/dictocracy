@props(['user_words'])

<div class="max-w-[439px] flex flex-col mb-5 4">
    <div class="bg-yellow-800 rounded-full px-12 py">
        <div>
            Latest Words:
        </div>
        @auth
        @foreach ($user_words as $word)
            <div>{{$word}}</div>
        @endforeach
        @endauth
    </div>


    <div class="bg-yellow-800 rounded-full px-12 py">
        <div>Your words Activity:</div>
        <div>Graph here <a href="https://apexcharts.com/docs/chart-types/line-chart/">Line Chart</a></div>
    </div>
</div>
