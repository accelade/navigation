@props([
    'href' => null,
    'icon' => null,
    'current' => false,
])

{{-- Breadcrumb Item - Style-free individual breadcrumb item --}}
<li
    data-slot="breadcrumb-item"
    data-navigation="breadcrumb-item"
    @if($current) aria-current="page" data-current="true" @endif
    {{ $attributes }}
>
    @if($href && !$current)
        <a
            href="{{ $href }}"
            data-slot="breadcrumb-link"
            data-navigation="breadcrumb-link"
        >
            @if($icon)
                <span data-slot="breadcrumb-icon">{!! $icon !!}</span>
            @endif
            <span data-slot="breadcrumb-label">{{ $slot }}</span>
        </a>
    @else
        <span
            data-slot="breadcrumb-page"
            data-navigation="breadcrumb-page"
        >
            @if($icon)
                <span data-slot="breadcrumb-icon">{!! $icon !!}</span>
            @endif
            <span data-slot="breadcrumb-label">{{ $slot }}</span>
        </span>
    @endif
</li>
