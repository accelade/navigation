@props([
    'label',
    'icon' => null,
    'collapsible' => true,
    'collapsed' => false,
])

{{-- Navigation Group - Style-free, add classes via attributes --}}
<x-accelade::toggle :data="!$collapsed">
    <div data-slot="nav-group" {{ $attributes }}>
        {{-- Group Header --}}
        @if($collapsible)
            <button
                type="button"
                @click.prevent="toggle()"
                data-slot="nav-group-header"
                data-collapsible="true"
            >
                @if($icon)
                    <x-dynamic-component
                        :component="$icon"
                        data-slot="nav-group-icon"
                    />
                @endif

                <span data-slot="nav-group-label">{{ $label }}</span>

                <svg
                    a-class="{ 'rotate-90': toggled }"
                    data-slot="nav-group-chevron"
                    class="transition-transform duration-200"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        @else
            <div data-slot="nav-group-header" data-collapsible="false">
                @if($icon)
                    <x-dynamic-component
                        :component="$icon"
                        data-slot="nav-group-icon"
                    />
                @endif

                <span data-slot="nav-group-label">{{ $label }}</span>
            </div>
        @endif

        {{-- Group Items --}}
        @if($collapsible)
            <x-accelade::transition
                show="toggled"
                enter="transition-all ease-out duration-200"
                enter-start="opacity-0 max-h-0"
                enter-end="opacity-100 max-h-96"
                leave="transition-all ease-in duration-150"
                leave-start="opacity-100 max-h-96"
                leave-end="opacity-0 max-h-0"
            >
                <div data-slot="nav-group-content">
                    {{ $slot }}
                </div>
            </x-accelade::transition>
        @else
            <div data-slot="nav-group-content">
                {{ $slot }}
            </div>
        @endif
    </div>
</x-accelade::toggle>
