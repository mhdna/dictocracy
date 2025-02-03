<a
    {{ $attributes->merge(['class' => 'text-black border-b-2 border-red-700 dark:text-white dark:border-red-600 hover:shadow-md hover:font-bold transition-all']) }}>
    {{ $slot }}
</a>
