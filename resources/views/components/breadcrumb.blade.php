@props([
    'items' => [],
    'separator' => null,
    'homeIcon' => null,
    'homeHref' => '/',
    'homeLabel' => 'Home',
    'showHome' => true,
])

{{-- Breadcrumb - Style-free breadcrumb navigation component --}}
<nav
    data-slot="breadcrumb"
    data-navigation="breadcrumb"
    aria-label="Breadcrumb"
    {{ $attributes }}
>
    <ol data-slot="breadcrumb-list" data-navigation="breadcrumb-list" class="flex items-center gap-2">
        {{-- Home Item --}}
        @if($showHome)
            <li data-slot="breadcrumb-item" data-navigation="breadcrumb-item">
                <a
                    href="{{ $homeHref }}"
                    data-slot="breadcrumb-link"
                    data-navigation="breadcrumb-link"
                >
                    @if($homeIcon)
                        <span data-slot="breadcrumb-icon">{!! $homeIcon !!}</span>
                    @else
                        <span data-slot="breadcrumb-home-label">{{ $homeLabel }}</span>
                    @endif
                </a>
            </li>
        @endif

        {{-- Dynamic Items --}}
        @foreach($items as $index => $item)
            {{-- Separator --}}
            <li data-slot="breadcrumb-separator" data-navigation="breadcrumb-separator" aria-hidden="true">
                @if($separator)
                    {!! $separator !!}
                @else
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                @endif
            </li>

            {{-- Item --}}
            <li
                data-slot="breadcrumb-item"
                data-navigation="breadcrumb-item"
                @if($loop->last) aria-current="page" data-current="true" @endif
            >
                @if(isset($item['href']) && !$loop->last)
                    <a
                        href="{{ $item['href'] }}"
                        data-slot="breadcrumb-link"
                        data-navigation="breadcrumb-link"
                    >
                        @if(isset($item['icon']))
                            <span data-slot="breadcrumb-icon">{!! $item['icon'] !!}</span>
                        @endif
                        <span data-slot="breadcrumb-label">{{ $item['label'] ?? $item }}</span>
                    </a>
                @else
                    <span
                        data-slot="breadcrumb-page"
                        data-navigation="breadcrumb-page"
                    >
                        @if(isset($item['icon']))
                            <span data-slot="breadcrumb-icon">{!! $item['icon'] !!}</span>
                        @endif
                        <span data-slot="breadcrumb-label">{{ $item['label'] ?? $item }}</span>
                    </span>
                @endif
            </li>
        @endforeach

        {{-- Slot for additional custom items --}}
        @if(!$slot->isEmpty())
            {{ $slot }}
        @endif
    </ol>
</nav>
