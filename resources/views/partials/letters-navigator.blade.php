<div class="flex font-sans  bg-red-900 flex-wrap gap-2 justify-center mt-4 py-4 px-4 rounded-full">
    @foreach (range('A', 'Z') as $letter)
        <a href="{{ route('termStartsWith', ['letter' => $letter]) }}"
            class="px-2 py-1 text-white bg-black rounded-full font-semibold transition-all duration-200 hover:bg-white hover:text-black">
            {{ $letter }}
        </a>
    @endforeach
</div>
