<div>
    <!-- <div> -->
    @foreach (range('A', 'Z') as $letter)
        <a href="/index?letter={{ $letter }}"
            class="px-2 py-2 bg-white text-black rounded-full">{{ $letter }}</a>
    @endforeach
    <!-- </div> -->
    <!-- <div class="mt-5"> -->
    <!-- </div> -->
</div>
