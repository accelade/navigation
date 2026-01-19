@props([
    'label',
    'icon' => null,
    'collapsible' => true,
    'collapsed' => false,
])

<div
    x-data="{ open: @js(! $collapsed) }"
    {{ $attributes->class(['space-y-1']) }}
>
    {{-- Group Header --}}
    @if($collapsible)
        <button
            type="button"
            @click="open = !open"
            class="group flex w-full items-center gap-x-3 rounded-lg px-3 py-2 text-left text-sm font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
        >
            @if($icon)
                <x-dynamic-component
                    :component="$icon"
                    class="h-5 w-5 shrink-0 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-400"
                />
            @endif

            <span class="flex-1 truncate">{{ $label }}</span>

            <x-heroicon-m-chevron-right
                x-bind:class="{ 'rotate-90': open }"
                class="h-4 w-4 shrink-0 text-gray-400 transition-transform duration-200"
            />
        </button>
    @else
        <div class="flex items-center gap-x-3 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-white">
            @if($icon)
                <x-dynamic-component
                    :component="$icon"
                    class="h-5 w-5 shrink-0 text-gray-400"
                />
            @endif

            <span class="truncate">{{ $label }}</span>
        </div>
    @endif

    {{-- Group Items --}}
    <div
        @if($collapsible)
            x-show="open"
            x-collapse
        @endif
        class="ml-4 space-y-1"
    >
        {{ $slot }}
    </div>
</div>
