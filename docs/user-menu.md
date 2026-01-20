# User Menu

User dropdown menus for headers and sidebars with `<x-navigation::user-menu>` and `<x-navigation::sidebar.user-menu>`.

## Header User Menu

```blade
<x-navigation::user-menu :user="auth()->user()">
    <x-navigation::user-menu-item href="/profile">
        Profile
    </x-navigation::user-menu-item>
    <x-navigation::user-menu-item href="/settings">
        Settings
    </x-navigation::user-menu-item>
    <x-navigation::user-menu-item :danger="true" @click="logout()">
        Sign out
    </x-navigation::user-menu-item>
</x-navigation::user-menu>
```

## User Menu Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `user` | object | `null` | User model with name/email properties |
| `avatar-url` | string | `null` | Override avatar URL |
| `position` | string | `'bottom-end'` | Dropdown position |
| `show-email` | bool | `true` | Show email in dropdown header |
| `show-avatar` | bool | `true` | Show avatar in trigger |

## Position Options

- `bottom-start` - Below, aligned left
- `bottom-end` - Below, aligned right
- `top-start` - Above, aligned left
- `top-end` - Above, aligned right

## Custom Trigger

Override the default avatar trigger:

```blade
<x-navigation::user-menu :user="$user">
    <x-slot:trigger>
        <div class="flex items-center gap-2">
            <img src="{{ $user->avatar }}" class="size-8 rounded-full" />
            <span>{{ $user->name }}</span>
            <x-heroicon-o-chevron-down class="size-4" />
        </div>
    </x-slot:trigger>

    <!-- Menu items -->
</x-navigation::user-menu>
```

## Custom Header

```blade
<x-navigation::user-menu :user="$user">
    <x-slot:header>
        <div class="px-4 py-3 border-b">
            <p class="font-semibold">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->role }}</p>
        </div>
    </x-slot:header>

    <!-- Menu items -->
</x-navigation::user-menu>
```

## User Menu Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `as` | string | `'button'` | HTML element |
| `href` | string | `null` | Link URL (uses anchor tag) |
| `icon` | string | `null` | Icon HTML |
| `danger` | bool | `false` | Danger/destructive styling hint |

## Sidebar User Menu

For use in sidebar footers with upward-opening dropdown:

```blade
<x-navigation::sidebar.footer>
    <x-navigation::sidebar.user-menu :user="auth()->user()">
        <x-slot:trigger>
            <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100">
                <span class="size-8 rounded-lg bg-blue-500 flex items-center justify-center text-white">
                    {{ substr($user->name, 0, 1) }}
                </span>
                <div class="group-data-[collapsible=icon]:hidden">
                    <p class="text-sm font-medium">{{ $user->name }}</p>
                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
        </x-slot:trigger>

        <!-- Menu items -->
    </x-navigation::sidebar.user-menu>
</x-navigation::sidebar.footer>
```

## Sidebar User Menu Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `user` | object | `null` | User model |
| `avatar-url` | string | `null` | Override avatar URL |
| `show-email` | bool | `true` | Show email |
| `show-avatar` | bool | `true` | Show avatar |
| `show-chevron` | bool | `true` | Show expand/collapse chevron |
| `collapsed-tooltip` | string | `null` | Tooltip when sidebar collapsed |

## Collapsible Sidebar Support

The sidebar user menu automatically adapts when the sidebar is collapsed:
- Shows only avatar when collapsed
- Displays tooltip on hover
- Full layout when expanded

```blade
<x-navigation::sidebar.user-menu
    :user="$user"
    collapsed-tooltip="John Doe"
/>
```

## Data Attributes

| Attribute | Description |
|-----------|-------------|
| `data-slot="user-menu"` | Header menu identifier |
| `data-slot="sidebar-user-menu"` | Sidebar menu identifier |
| `data-authenticated` | `"true"` or `"false"` |
