<div class="flex justify-between">
    <x-term-card :term="$term->term" class="text-3xl font-bold mb-4 dark:text-white" />
    {{-- @include('definitions.shared.edit-delete-form') --}}
</div>
<p class="text-base text-black dark:text-white mb-4">
    <span class="text-red-700">Definition</span>: {{ $definition->definition }}
</p>
@if ($definition->example)
    <p class="text-base mt-4 italic text-gray-600 dark:text-gray-400">
        <span class="text-green-700">Example</span>: {{ $definition->example }}
    </p>
@endif
