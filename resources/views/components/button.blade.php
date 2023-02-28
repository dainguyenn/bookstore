@props(['primary' => 'bg-primary hover:bg-h_primary',
        'href'
])

@php
$comp = 'button';
$classes='py-[7px] px-[12px]  text-white cursor-pointer rounded-md ';

$href?$comp='a': $href='';

$primary? $classes .= $primary:'';  
@endphp
<{{$comp}} {{$attributes->merge(['class'=>$classes]) }}>
    {{$slot}}
</{{$comp}}>
