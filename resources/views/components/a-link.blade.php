
@php
    $styles = [
        'primary' => 'bg-primary hover:bg-h_primary',
        'warning' => 'bg-warning hover:bg-h-warning',
        'danger' => 'bg-danger hover:bg-h-danger'
    ];
    $classes = 'py-[7px] px-[12px]  text-white cursor-pointer rounded-md ';
    isset($primary) ? $classes.=$primary : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
