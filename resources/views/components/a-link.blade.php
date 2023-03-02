
@php
    $classes = 'py-[7px] px-[12px]  text-black cursor-pointer rounded-md border-2 hover:text-white '; 
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
