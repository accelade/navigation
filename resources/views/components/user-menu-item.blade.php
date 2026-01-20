@props([
    'as' => 'button',
    'href' => null,
    'icon' => null,
    'danger' => false,
])

@php
    $tag = $href ? 'a' : $as;
@endphp

{{-- User Menu Item - Style-free item for user menu dropdown --}}
<{{ $tag }}
    data-slot="user-menu-item"
    data-navigation="user-menu-item"
    data-danger="{{ $danger ? 'true' : 'false' }}"
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes }}
>
    @if($icon)
        <span data-slot="user-menu-item-icon">
            {!! $icon !!}
        </span>
    @endif
    <span data-slot="user-menu-item-label">
        {{ $slot }}
    </span>
</{{ $tag }}>
