
@php 
$classes='py-[7px] px-[12px] text-black cursor-pointer border-2 rounded-md hover:text-white';
   
@endphp
<button {{$attributes->merge(['class'=>$classes]) }}>
    {{$slot}}
</button>
