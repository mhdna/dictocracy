<div class="flex space-x-6">
    <!-- Upvote -->
    <div>
        <form action="{{ route('definition.upvote', $definition->id) }}" method="POST">
            @csrf
            <button type="submit">Upvotes: {{ $definition->votes()->where('vote', 1)->count() }}</button>
        </form>
    </div>
    <div>
        <form action="{{ route('definition.downvote', $definition->id) }}" method="POST">
            @csrf
            <button type="submit">Downvotes: {{ $definition->votes()->where('vote', -1)->count() }}</button>
        </form>
    </div>
</div>
