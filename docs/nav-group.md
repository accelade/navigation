# Nav Group Component

The `<x-navigation::nav-group>` component creates collapsible navigation sections.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | required | Group label |
| `icon` | string | null | Icon for the group |
| `collapsible` | bool | true | Allow collapse |
| `collapsed` | bool | false | Initial state |

## Basic Usage

```blade
<x-navigation::nav-group label="Content" icon="heroicon-o-document-text">
    <x-navigation::nav-item label="Posts" href="/posts" />
    <x-navigation::nav-item label="Pages" href="/pages" />
    <x-navigation::nav-item label="Media" href="/media" />
</x-navigation::nav-group>
```

## Non-Collapsible

Static groups that cannot be collapsed:

```blade
<x-navigation::nav-group label="Quick Links" :collapsible="false">
    <x-navigation::nav-item label="Documentation" href="/docs" />
    <x-navigation::nav-item label="Support" href="/support" />
</x-navigation::nav-group>
```

## Initially Collapsed

Start with the group collapsed:

```blade
<x-navigation::nav-group label="Advanced" :collapsed="true">
    <x-navigation::nav-item label="API Keys" href="/api-keys" />
    <x-navigation::nav-item label="Webhooks" href="/webhooks" />
</x-navigation::nav-group>
```

## Nested Groups

```blade
<x-navigation::nav>
    <x-navigation::nav-item label="Dashboard" href="/dashboard" />

    <x-navigation::nav-group label="Content" icon="heroicon-o-folder">
        <x-navigation::nav-item label="Posts" href="/posts" badge="24" />
        <x-navigation::nav-item label="Categories" href="/categories" />
    </x-navigation::nav-group>

    <x-navigation::nav-group label="Settings" icon="heroicon-o-cog-6-tooth">
        <x-navigation::nav-item label="General" href="/settings" />
        <x-navigation::nav-item label="Users" href="/settings/users" />
    </x-navigation::nav-group>
</x-navigation::nav>
```
