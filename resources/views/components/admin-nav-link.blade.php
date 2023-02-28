@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-[18px] rounded-[3.5px] my-[3px] bg-[#443C68] hover:bg-[#443C68] ease-in duration-[250ms]'
            : 'text-[18px] rounded-[3.5px] my-[3px] hover:bg-[#443C68] ease-in duration-[250ms]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
