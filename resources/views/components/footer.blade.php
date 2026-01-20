@props([
    'copyright' => null,
    'brand' => null,
    'year' => null,
])

@php
    $brandName = $brand ?? config('app.name', 'Laravel');
    $currentYear = $year ?? date('Y');
@endphp

{{-- Footer - Style-free page footer component --}}
<footer
    data-slot="footer"
    data-navigation="footer"
    {{ $attributes }}
>
    {{-- Leading section (usually copyright) --}}
    @if($leading ?? false)
        <div data-slot="footer-leading" data-navigation="footer-leading">
            {{ $leading }}
        </div>
    @else
        <div data-slot="footer-copyright" data-navigation="footer-copyright">
            @if($copyright)
                {{ $copyright }}
            @else
                <span>&copy; {{ $currentYear }} {{ $brandName }}. All rights reserved.</span>
            @endif
        </div>
    @endif

    {{-- Center content --}}
    @if($center ?? false)
        <div data-slot="footer-center" data-navigation="footer-center">
            {{ $center }}
        </div>
    @endif

    {{-- Default slot (usually links) --}}
    @if(!$slot->isEmpty())
        <div data-slot="footer-content" data-navigation="footer-content">
            {{ $slot }}
        </div>
    @endif

    {{-- Trailing section (usually additional links or info) --}}
    @if($trailing ?? false)
        <div data-slot="footer-trailing" data-navigation="footer-trailing">
            {{ $trailing }}
        </div>
    @endif
</footer>
