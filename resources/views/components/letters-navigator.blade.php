<div class="flex flex-wrap gap-2 justify-center mt-4">
    @foreach (range('A', 'Z') as $letter)
        <a href="/term_id?letter={{ $letter }}"
            class="px-3 py-2 bg-gray-200 text-black rounded-full text-lg font-semibold transition-all duration-200 hover:bg-blue-500 hover:text-white">
            {{ $letter }}
        </a>
    @endforeach
</div>
