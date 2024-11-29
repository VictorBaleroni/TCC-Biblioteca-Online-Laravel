@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex justify-center items-center mb-1 p-3 rounded-lg dark:text-white bg-gray-100 dark:bg-gray-700'
            : 'flex justify-center items-center mb-1 p-3 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
