@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-favocrew_lightgrey font-medium leading-5 text-favocrew_lightgrey focus:outline-none focus:border-#640408 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 text-favocrew_darkgrey hover:text-favocrew_grey hover:border-gray-300 focus:outline-none focus:text-favocrew_lightgrey focus:border-favocrew_lightgrey transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
