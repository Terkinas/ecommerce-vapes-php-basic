@props(['active'])

@php
$classes = ($active ?? false)
? 'block pl-3 pr-4 py-2 border-l-4 border-green-500 text-base font-medium text-grey-700 bg-green-50 focus:outline-none focus:text-grey-800 focus:bg-green-100 focus:border-green-700 transition'
: 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-grey-600 hover:text-grey-800 hover:bg-green-50 hover:border-green-300 focus:outline-none focus:text-grey-800 focus:bg-green-50 focus:border-green-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>