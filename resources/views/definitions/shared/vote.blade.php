<div class="flex space-x-6">
    <!-- Upvote -->
    <div>
        <form action="{{ route('definition.upvote', $definition->id) }}" method="POST">
            @csrf
            <button class="text-xl text-green-600 " type="submit">
                <i class="fa-solid fa-up-long"></i>
                {{ $definition->votes()->where('vote', 1)->count() }}</button>
        </form>
    </div>
    <div>
        <form action="{{ route('definition.downvote', $definition->id) }}" method="POST">
            @csrf
            <button class="text-xl text-red-600" type="submit">
                <i class="fa-solid fa-down-long"></i>
                {{ $definition->votes()->where('vote', -1)->count() }}
            </button>
    </div>
    </form>
</div>
