# Nav Item Component

The `<x-navigation::nav-item>` component creates navigation links with icons, badges, and active states.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | required | Text label |
| `href` | string | null | URL to navigate to |
| `icon` | string | null | Icon component (e.g., `heroicon-o-home`) |
| `activeIcon` | string | null | Icon when active |
| `badge` | string | null | Badge text |
| `badgeColor` | string | 'gray' | Badge color |
| `active` | bool | false | Force active state |
| `external` | bool | false | Open in new tab |

## Badges

```blade
<x-navigation::nav-item
    label="Notifications"
    href="/notifications"
    icon="heroicon-o-bell"
    badge="12"
    badge-color="danger"
/>
```

### Badge Colors

| Color | Description |
|-------|-------------|
| `primary` | Primary brand color |
| `success` | Green for positive states |
| `warning` | Yellow for warnings |
| `danger` | Red for alerts/errors |
| `info` | Blue for information |
| `gray` | Neutral gray (default) |

## External Links

```blade
<x-navigation::nav-item
    label="Documentation"
    href="https://docs.example.com"
    icon="heroicon-o-book-open"
    :external="true"
/>
```

External links show an icon and open in a new tab.

## Horizontal Layout

```blade
<x-navigation::nav direction="horizontal">
    <x-navigation::nav-item label="Home" href="/" />
    <x-navigation::nav-item label="Products" href="/products" />
</x-navigation::nav>
```
