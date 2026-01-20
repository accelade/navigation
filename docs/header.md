# Header

Page headers with `<x-navigation::header>`. Style-free component with slots for leading, center, and trailing content.

## Basic Usage

```blade
<x-navigation::header>
    <x-slot:leading>
        <x-navigation::sidebar.trigger>
            <button class="p-2">
                <x-heroicon-o-bars-3 class="size-5" />
            </button>
        </x-navigation::sidebar.trigger>
    </x-slot:leading>

    <h1>Dashboard</h1>

    <x-slot:trailing>
        <x-navigation::user-menu :user="auth()->user()" />
    </x-slot:trailing>
</x-navigation::header>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `sticky` | bool | `true` | Whether header should be sticky |

## Slots

| Slot | Description |
|------|-------------|
| `leading` | Left side content (toggle, logo) |
| `center` | Center content (search, title) |
| `trailing` | Right side content (actions, user menu) |
| default | Content between leading and trailing |

## With Breadcrumbs

```blade
<x-navigation::header class="flex items-center px-4 py-3 border-b">
    <x-slot:leading>
        <x-navigation::sidebar.trigger>
            <button class="p-2 rounded-lg hover:bg-gray-100">
                <x-heroicon-o-bars-3 class="size-5" />
            </button>
        </x-navigation::sidebar.trigger>
        <div class="h-4 w-px bg-gray-200 mx-2"></div>
    </x-slot:leading>

    <x-navigation::breadcrumb
        :items="[
            ['label' => 'Users', 'href' => '/users'],
            ['label' => 'Edit'],
        ]"
        class="flex items-center gap-2 text-sm"
    />

    <x-slot:trailing>
        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">
            Save
        </button>
    </x-slot:trailing>
</x-navigation::header>
```

## With Global Search

```blade
<x-navigation::header class="flex items-center px-4 py-3 border-b">
    <x-slot:leading>
        <x-navigation::sidebar.trigger>
            <button class="p-2">
                <x-heroicon-o-bars-3 class="size-5" />
            </button>
        </x-navigation::sidebar.trigger>
    </x-slot:leading>

    <x-slot:center>
        <div class="relative max-w-md w-full">
            <x-heroicon-o-magnifying-glass
                class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-gray-400"
            />
            <input
                type="search"
                placeholder="Search..."
                class="w-full pl-10 pr-4 py-2 rounded-lg border"
            />
            <kbd class="absolute right-3 top-1/2 -translate-y-1/2 px-1.5 py-0.5 text-xs bg-gray-100 rounded">
                ⌘K
            </kbd>
        </div>
    </x-slot:center>

    <x-slot:trailing>
        <x-navigation::theme-toggle class="p-2" />
        <x-navigation::user-menu :user="auth()->user()" />
    </x-slot:trailing>
</x-navigation::header>
```

## Styling

The component is style-free. Common patterns:

```blade
{{-- Sticky header --}}
<x-navigation::header
    class="sticky top-0 z-20 flex items-center gap-4 px-4 py-3 bg-white border-b"
/>

{{-- Transparent header --}}
<x-navigation::header
    class="absolute top-0 left-0 right-0 z-20 flex items-center px-6 py-4"
/>
```

## Data Attributes

| Attribute | Description |
|-----------|-------------|
| `data-slot="header"` | Main container |
| `data-navigation="header"` | Navigation type |
| `data-sticky="true"` | Sticky indicator |
| `data-slot="header-leading"` | Leading slot |
| `data-slot="header-center"` | Center slot |
| `data-slot="header-trailing"` | Trailing slot |
| `data-slot="header-content"` | Default content |
| `data-slot="header-spacer"` | Flex spacer |

## CSS Styling by Data Attributes

```css
[data-slot="header"] {
    @apply flex items-center gap-4 px-4 h-16;
}

[data-slot="header"][data-sticky="true"] {
    @apply sticky top-0 z-20;
}

[data-slot="header-leading"] {
    @apply flex items-center gap-2;
}

[data-slot="header-spacer"] {
    @apply flex-1;
}

[data-slot="header-trailing"] {
    @apply flex items-center gap-2;
}
```

## With Sidebar Integration

```blade
<x-navigation::sidebar.provider>
    <x-navigation::sidebar.sidebar>
        <!-- Sidebar content -->
    </x-navigation::sidebar.sidebar>

    <x-navigation::sidebar.inset>
        <x-navigation::header>
            <x-slot:leading>
                {{-- Mobile toggle --}}
                <x-navigation::sidebar.trigger class="md:hidden">
                    <button>Toggle</button>
                </x-navigation::sidebar.trigger>
                {{-- Desktop collapse toggle --}}
                <x-navigation::sidebar.trigger class="hidden md:block">
                    <button>Collapse</button>
                </x-navigation::sidebar.trigger>
            </x-slot:leading>
            <!-- ... -->
        </x-navigation::header>

        <main>
            <!-- Page content -->
        </main>
    </x-navigation::sidebar.inset>
</x-navigation::sidebar.provider>
```
