@props(['term'])

<a href="{{ route('term', ['term' => $term]) }}" {{ $attributes->merge(['class' => 'block leading-6 text-gray-900']) }}>
    {{ $term }} </a>
