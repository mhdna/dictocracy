<x-layout>
    <div class="flex justify-between">
        <div>
            <x-sidebar :$user_words />
        </div>
        <div>
            <div>47 new definitions this week</div>
            <div>Order: </div>
            @foreach ($words as $word)
                <x-card :$word />
            @endforeach
        </div>
    </div>
</x-layout>
