{{-- TODO: Super confusing mix between under_definition and defintions --}}
<x-layout>
    <div class="flex justify-between">
        @if ($user_definitions)
            <div>
                <x-sidebar :$user_definitions />
            </div>
        @endif
        <div>
            <div>47 new definitions this week</div>
            <div>Order: </div>
            @if ($definitions)
                @foreach ($definitions as $definition)
                    <x-card :$definition />
                @endforeach
            @else
                <p>No terms are defined</p>
            @endif
        </div>
    </div>
    <div class="mt-4 mb-20">
        {{ $definitions->links() }}
    </div>
</x-layout>
