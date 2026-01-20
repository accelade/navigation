@props([
    'sticky' => true,
])

{{-- Header - Style-free page header component --}}
<header
    data-slot="header"
    data-navigation="header"
    data-sticky="{{ $sticky ? 'true' : 'false' }}"
    {{ $attributes }}
>
    {{-- Leading section (usually mobile toggle, logo) --}}
    @if($leading ?? false)
        <div data-slot="header-leading" data-navigation="header-leading">
            {{ $leading }}
        </div>
    @endif

    {{-- Center/Main content (usually breadcrumbs or title) --}}
    @if($center ?? false)
        <div data-slot="header-center" data-navigation="header-center">
            {{ $center }}
        </div>
    @endif

    {{-- Default slot (middle content if no center slot) --}}
    @if(!$slot->isEmpty() && !($center ?? false))
        <div data-slot="header-content" data-navigation="header-content">
            {{ $slot }}
        </div>
    @endif

    {{-- Spacer (grows to push trailing to the right) --}}
    <div data-slot="header-spacer" data-navigation="header-spacer" class="flex-1"></div>

    {{-- Trailing section (usually actions, user menu) --}}
    @if($trailing ?? false)
        <div data-slot="header-trailing" data-navigation="header-trailing">
            {{ $trailing }}
        </div>
    @endif
</header>
