
@php 
$classes='py-[7px] px-[12px] text-white cursor-pointer rounded-md ';
   
@endphp
<button {{$attributes->merge(['class'=>$classes]) }}>
    {{$slot}}
</button>
