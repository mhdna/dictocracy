@props(['word'])

<div class="max-w-[639px] flex flex-col mb-5 bg-yellow-800 rounded-full px-12 py-4 dark:bg-blue-400">
    <!-- max-h-[667px] -->
    <div>
        <h2>{{ $word->word }}</h2>
        <div>Onzul lee creative</div>
        {{-- Only show dialects for Arabic --}}
        @if ($word->language->name === 'ar')
            <div>
                <span>Phrase in:</span>
                <span>Dailect 1</span>
                <span>Dailect 2</span>
            </div>
        @endif

        <div>
            {{ $word->meaning }}
        </div>

        <div>
            {{ $word->example }}
        </div>
    </div>

    <div class="flex justify-between">
        <div class="flex justify-between">
            <div>Upvotes: {{ $word->upvotes }}</div>
            <div>Downvotes: {{ $word->downvotes }}</div>
        </div>

        <div class="flex justify-between">
            <div>Facebook</div>
            <div>Instagram</div>
        </div>


        <div>
            Created by:
            <img src="{{ $word->user->logo }}" alt="User Logo">
            {{ $word->user->name }}
        </div>
    </div>
</div>
