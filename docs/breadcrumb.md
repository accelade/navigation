# Breadcrumb

Navigation breadcrumbs with `<x-navigation::breadcrumb>`. Supports dynamic items, custom separators, and accessible markup.

## Basic Usage

```blade
<x-navigation::breadcrumb
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard'],
        ['label' => 'Users', 'href' => '/users'],
        ['label' => 'Edit User'],
    ]"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | array | `[]` | Array of breadcrumb items |
| `separator` | string | `null` | Custom separator HTML |
| `home-icon` | string | `null` | Icon for home link |
| `home-href` | string | `'/'` | Home link URL |
| `home-label` | string | `'Home'` | Home link text |
| `show-home` | bool | `true` | Show home as first item |

## Item Structure

Each item in the `items` array can have:

```php
[
    'label' => 'Page Title',   // Required: Display text
    'href' => '/path',         // Optional: Link URL
    'icon' => '<svg>...</svg>' // Optional: Icon HTML
]
```

The last item is automatically marked as the current page (no link).

## With Home Icon

```blade
<x-navigation::breadcrumb
    :items="$breadcrumbs"
    :home-icon="'<svg>...</svg>'"
/>
```

## Custom Separator

```blade
{{-- Text separator --}}
<x-navigation::breadcrumb
    :items="$breadcrumbs"
    separator="/"
/>

{{-- Custom icon separator --}}
<x-navigation::breadcrumb
    :items="$breadcrumbs"
    :separator="'<svg class=\"size-4\">...</svg>'"
/>
```

## Without Home

```blade
<x-navigation::breadcrumb
    :items="$breadcrumbs"
    :show-home="false"
/>
```

## Manual Items

Build breadcrumbs manually using child components:

```blade
<x-navigation::breadcrumb :items="[]" :show-home="false">
    <x-navigation::breadcrumb-item href="/dashboard">
        Dashboard
    </x-navigation::breadcrumb-item>

    <x-navigation::breadcrumb-separator />

    <x-navigation::breadcrumb-item href="/users">
        Users
    </x-navigation::breadcrumb-item>

    <x-navigation::breadcrumb-separator />

    <x-navigation::breadcrumb-item :current="true">
        John Doe
    </x-navigation::breadcrumb-item>
</x-navigation::breadcrumb>
```

## Breadcrumb Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `null` | Link URL |
| `icon` | string | `null` | Icon HTML |
| `current` | bool | `false` | Mark as current page |

## Breadcrumb Separator

The separator component renders the default chevron or custom content:

```blade
{{-- Default chevron --}}
<x-navigation::breadcrumb-separator />

{{-- Custom content --}}
<x-navigation::breadcrumb-separator>
    <span class="mx-2">/</span>
</x-navigation::breadcrumb-separator>
```

## Styling

The component is style-free. Add classes to style:

```blade
<x-navigation::breadcrumb
    :items="$breadcrumbs"
    class="flex items-center gap-2 text-sm text-gray-500"
/>
```

Style the data attributes:

```css
[data-slot="breadcrumb-link"] {
    @apply hover:text-gray-900 transition-colors;
}

[data-slot="breadcrumb-page"] {
    @apply font-medium text-gray-900;
}

[data-slot="breadcrumb-separator"] {
    @apply text-gray-300;
}
```

## Data Attributes

| Attribute | Description |
|-----------|-------------|
| `data-slot="breadcrumb"` | Main container |
| `data-slot="breadcrumb-list"` | Ordered list |
| `data-slot="breadcrumb-item"` | Individual item |
| `data-slot="breadcrumb-link"` | Clickable link |
| `data-slot="breadcrumb-page"` | Current page (not a link) |
| `data-slot="breadcrumb-separator"` | Separator element |
| `data-current="true"` | Current page indicator |

## Accessibility

The component includes:
- `<nav>` element with `aria-label="Breadcrumb"`
- `aria-current="page"` on the current item
- `aria-hidden="true"` on separators
- Semantic `<ol>` list structure
