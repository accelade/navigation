@props([
    'side' => 'left',
    'variant' => 'sidebar', // sidebar, floating, inset
    'collapsible' => 'icon', // offcanvas, icon, none
    'mobileClass' => '',
    'desktopClass' => '',
    'backdropClass' => '',
])

{{-- Non-collapsible sidebar --}}
@if($collapsible === 'none')
    <div
        data-slot="sidebar"
        data-variant="{{ $variant }}"
        data-side="{{ $side }}"
        {{ $attributes }}
    >
        {{ $slot }}
    </div>
@else
    {{-- Mobile Sheet Sidebar --}}
    <div a-show="sidebarMobileOpen" class="md:hidden">
        {{-- Backdrop --}}
        <div
            @click="$set('sidebarMobileOpen', false)"
            @class(['fixed inset-0 z-40', $backdropClass ?: 'bg-black/50 backdrop-blur-sm'])
        ></div>

        {{-- Mobile Sidebar --}}
        <x-accelade::transition
            enter="transition ease-out duration-200"
            enter-start="{{ $side === 'left' ? '-translate-x-full' : 'translate-x-full' }} opacity-0"
            enter-end="translate-x-0 opacity-100"
            leave="transition ease-in duration-150"
            leave-start="translate-x-0 opacity-100"
            leave-end="{{ $side === 'left' ? '-translate-x-full' : 'translate-x-full' }} opacity-0"
        >
            <aside
                a-show="sidebarMobileOpen"
                data-sidebar="sidebar"
                data-slot="sidebar"
                data-mobile="true"
                data-variant="{{ $variant }}"
                data-side="{{ $side }}"
                @class([
                    'fixed inset-y-0 z-50 flex flex-col',
                    $side === 'left' ? 'left-0' : 'right-0',
                    $mobileClass,
                ])
            >
                {{ $slot }}
            </aside>
        </x-accelade::transition>
    </div>

    {{-- Desktop Sidebar --}}
    <div
        class="group peer hidden md:block"
        data-slot="sidebar"
        :data-state="sidebarOpen ? 'expanded' : 'collapsed'"
        :data-collapsible="!sidebarOpen ? '{{ $collapsible }}' : ''"
        data-variant="{{ $variant }}"
        data-side="{{ $side }}"
    >
        {{-- Sidebar gap spacer (pushes content) --}}
        <div
            class="relative bg-transparent transition-[width] duration-200 ease-linear"
            a-class="{
                'w-[var(--sidebar-width)]': sidebarOpen,
                'w-[var(--sidebar-width-icon)]': !sidebarOpen && '{{ $collapsible }}' === 'icon',
                'w-0': !sidebarOpen && '{{ $collapsible }}' === 'offcanvas'
            }"
        ></div>

        {{-- Fixed sidebar container --}}
        <div
            @class([
                'fixed inset-y-0 z-10 hidden h-svh md:flex',
                'transition-[left,right,width] duration-200 ease-linear',
                $side === 'left' ? 'left-0' : 'right-0',
            ])
            a-class="{
                'w-[var(--sidebar-width)]': sidebarOpen,
                'w-[var(--sidebar-width-icon)]': !sidebarOpen && '{{ $collapsible }}' === 'icon',
                {{ $side === 'left' ? "'left-[calc(var(--sidebar-width)*-1)]': !sidebarOpen && '$collapsible' === 'offcanvas'" : "'right-[calc(var(--sidebar-width)*-1)]': !sidebarOpen && '$collapsible' === 'offcanvas'" }}
            }"
        >
            <div
                data-sidebar="sidebar"
                {{ $attributes->class([$desktopClass]) }}
            >
                {{ $slot }}
            </div>
        </div>
    </div>
@endif
