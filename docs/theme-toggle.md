# Theme Toggle

Switch between light, dark, and system themes with `<x-navigation::theme-toggle>`. The component persists the selected theme in localStorage.

## Basic Usage

```blade
<x-navigation::theme-toggle />
```

## With System Option

Enable cycling through light, dark, and system modes:

```blade
<x-navigation::theme-toggle :show-system="true" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `as` | string | `'button'` | HTML element to render |
| `store` | string | `'theme'` | State store name |
| `persist` | bool | `true` | Persist theme in localStorage |
| `show-system` | bool | `false` | Include system preference option |
| `light-icon` | string | `null` | Custom icon for light mode |
| `dark-icon` | string | `null` | Custom icon for dark mode |
| `system-icon` | string | `null` | Custom icon for system mode |

## Custom Icons

Override the default sun/moon icons:

```blade
<x-navigation::theme-toggle>
    <x-slot:lightIcon>
        <x-heroicon-o-sun class="size-5" />
    </x-slot:lightIcon>
    <x-slot:darkIcon>
        <x-heroicon-o-moon class="size-5" />
    </x-slot:darkIcon>
</x-navigation::theme-toggle>
```

## Custom Slot

Provide completely custom content:

```blade
<x-navigation::theme-toggle :show-system="true">
    <span a-show="theme === 'light'">Light Mode</span>
    <span a-show="theme === 'dark'">Dark Mode</span>
    <span a-show="theme === 'system'">System</span>
</x-navigation::theme-toggle>
```

## Styling

The component is style-free. Add your own classes:

```blade
<x-navigation::theme-toggle
    class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
/>
```

## Data Attributes

| Attribute | Description |
|-----------|-------------|
| `data-slot="theme-toggle"` | Component identifier |
| `data-navigation="theme-toggle"` | Navigation type identifier |

## Theme Application

The component automatically:
- Adds/removes the `dark` class on `<html>`
- Persists selection to localStorage
- Respects system preference when set to "system"
- Listens for system preference changes
