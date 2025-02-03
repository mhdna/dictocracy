@props(['term'])

<a href="{{ route('term', ['term' => $term]) }}"
    class="max-w-[639px] flex flex-col mb-5 bg-yellow-800 rounded-full px-12 py-4 dark:bg-blue-400">
    {{ $term }}
</a>
{{-- Delete Form --}}
{{-- <form action="{{ route('definitions.destroy', $term) }}" method="POST" --}}
{{--     onsubmit="return confirm('Are you sure you want to delete this definition?');"> --}}
{{--     @csrf --}}
{{--     @method('DELETE') --}}
{{--     <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded mt-2">Delete</button> --}}
{{-- </form> --}}
