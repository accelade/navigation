@props([
    'defaultOpen' => true,
    'store' => 'sidebar',
    'persist' => 'sidebarOpen',
    'keyboardShortcut' => true,
])

@php
    // Build localStorage key from store name and persist field
    $localStorageKey = $store . ':' . $persist;
@endphp

{{-- Sidebar Provider - Style-free wrapper that provides sidebar state management --}}
<x-accelade::data
    :default="[
        'sidebarOpen' => $defaultOpen,
        'sidebarMobileOpen' => false,
    ]"
    :store="$store"
    :localStorage="$localStorageKey"
>
    @if($keyboardShortcut)
        <x-accelade::script>
            // Sidebar keyboard shortcut (Ctrl/Cmd + B)
            document.addEventListener('keydown', (e) => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'b') {
                    e.preventDefault();
                    const isMobile = window.innerWidth < 768;
                    if (isMobile) {
                        $set('sidebarMobileOpen', !$get('sidebarMobileOpen'));
                    } else {
                        $set('sidebarOpen', !$get('sidebarOpen'));
                    }
                }
            });
        </x-accelade::script>
    @endif

    <div data-slot="sidebar-wrapper" {{ $attributes }}>
        {{ $slot }}
    </div>
</x-accelade::data>
