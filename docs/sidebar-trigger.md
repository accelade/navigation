# Sidebar Trigger

The trigger component toggles the sidebar open/closed state.

## Basic Usage

```blade
<x-navigation::sidebar.trigger>
    <button class="p-2 rounded-lg hover:bg-gray-100">
        <x-heroicon-o-bars-3 class="size-5" />
    </button>
</x-navigation::sidebar.trigger>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `as` | string | `'button'` | Wrapper element type |

## Placement

### In Header

Place the trigger in your page header for easy access:

```blade
<x-navigation::sidebar.inset>
    <header class="flex items-center gap-4 px-4 py-3 border-b">
        <x-navigation::sidebar.trigger>
            <button class="p-2 rounded-lg hover:bg-gray-100 md:hidden">
                <x-heroicon-o-bars-3 class="size-5" />
            </button>
        </x-navigation::sidebar.trigger>

        <h1>Page Title</h1>
    </header>

    <main>
        <!-- Page content -->
    </main>
</x-navigation::sidebar.inset>
```

### In Sidebar

Add a trigger inside the sidebar for desktop collapse:

```blade
<x-navigation::sidebar.sidebar>
    <x-navigation::sidebar.header class="flex items-center justify-between">
        <span>Logo</span>
        <x-navigation::sidebar.trigger>
            <button class="p-1 rounded hover:bg-gray-100 hidden md:block">
                <x-heroicon-o-chevron-left class="size-4" />
            </button>
        </x-navigation::sidebar.trigger>
    </x-navigation::sidebar.header>

    <!-- Rest of sidebar -->
</x-navigation::sidebar.sidebar>
```

## Responsive Behavior

The trigger automatically handles mobile and desktop states:

- **Mobile** (< 768px): Toggles `sidebarMobileOpen`
- **Desktop** (>= 768px): Toggles `sidebarOpen`

```blade
{{-- Show on mobile only --}}
<x-navigation::sidebar.trigger>
    <button class="md:hidden">
        <x-heroicon-o-bars-3 class="size-5" />
    </button>
</x-navigation::sidebar.trigger>

{{-- Show on desktop only --}}
<x-navigation::sidebar.trigger>
    <button class="hidden md:block">
        <x-heroicon-o-chevron-left class="size-5" />
    </button>
</x-navigation::sidebar.trigger>
```

## Custom Trigger

You can create custom triggers using Accelade's state system:

```blade
<button @click="$set('sidebarOpen', !$get('sidebarOpen'))">
    Toggle Sidebar
</button>
```

Or for mobile:

```blade
<button @click="$set('sidebarMobileOpen', !$get('sidebarMobileOpen'))">
    Open Menu
</button>
```

## Icon Rotation

Animate the trigger icon based on sidebar state:

```blade
<x-navigation::sidebar.trigger>
    <button class="p-2">
        <svg
            a-class="{ 'rotate-180': !sidebarOpen }"
            class="size-5 transition-transform"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
</x-navigation::sidebar.trigger>
```

## Accessibility

The trigger component includes:

- Proper button semantics
- Click and touch support
- Keyboard activation (Enter/Space)

Consider adding ARIA labels:

```blade
<x-navigation::sidebar.trigger>
    <button aria-label="Toggle sidebar" aria-expanded="false">
        <x-heroicon-o-bars-3 class="size-5" />
    </button>
</x-navigation::sidebar.trigger>
```
