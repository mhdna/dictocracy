<div class="flex space-x-6">
    @if (auth()->user()->hasRole('Admin'))
        <x-button href="/users">
            <i class="fa-solid fa-users"></i> Users
        </x-button>
        <x-button href="/roles">
            <i class="fa-solid fa-gear"></i> Roles
        </x-button>
        <x-button :href="route('approve')">
            <i class="fa-solid fa-flag"></i> Approvals
        </x-button>
    @else
        <x-button :href="route('userDefinitions')">
            <i class="fa-solid fa-book"></i> My Definitions
        </x-button>
        <x-button :href="route('definitions.create')">
            <i class="fas fa-plus"></i> Add Term
        </x-button>
    @endif
</div>
