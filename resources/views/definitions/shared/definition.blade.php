<h2 class="text-2xl font-semibold mb-2">{{ $term->term }}</h2>
<p class="text-sm text-gray-300 mb-4">Onzul Lee Creative</p>

{{-- Only show dialects for Arabic --}}
{{-- TODO fix null pointer --}}
{{-- @if ($term->language->name === 'ar') --}}
{{--     <div class="mb-4"> --}}
{{--         <span class="font-semibold">Phrase in:</span> --}}
{{--         <span>Dialect 1</span>, --}}
{{--         <span>Dialect 2</span> --}}
{{--     </div> --}}
{{-- @endif --}}

<p class="text-base mb-4">{{ $definition->definition }}</p>
<p class="text-sm italic text-gray-200">{{ $definition->example }}</p>
