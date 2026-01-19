# Navigation Examples

Real-world navigation examples for common use cases.

## Admin Sidebar

```blade
<aside class="w-64 bg-white dark:bg-gray-900 border-r">
    <x-navigation::nav class="p-4">
        <x-navigation::nav-item
            label="Dashboard"
            href="/admin/dashboard"
            icon="heroicon-o-home"
        />

        <x-navigation::nav-group label="Content" icon="heroicon-o-folder">
            <x-navigation::nav-item label="Posts" href="/admin/posts" badge="24" />
            <x-navigation::nav-item label="Categories" href="/admin/categories" />
        </x-navigation::nav-group>

        <x-navigation::nav-group label="Users" icon="heroicon-o-users">
            <x-navigation::nav-item label="All Users" href="/admin/users" />
            <x-navigation::nav-item label="Roles" href="/admin/roles" />
        </x-navigation::nav-group>
    </x-navigation::nav>
</aside>
```

## Header Navigation

```blade
<header class="bg-white dark:bg-gray-900 border-b">
    <div class="container mx-auto px-4">
        <x-navigation::nav direction="horizontal" class="h-16">
            <x-navigation::nav-item label="Home" href="/" />
            <x-navigation::nav-item label="Features" href="/features" />
            <x-navigation::nav-item label="Pricing" href="/pricing" />
            <x-navigation::nav-item
                label="Docs"
                href="https://docs.example.com"
                :external="true"
            />
        </x-navigation::nav>
    </div>
</header>
```

## Dashboard Stats

```blade
<x-navigation::nav>
    <x-navigation::nav-item
        label="Orders"
        href="/orders"
        icon="heroicon-o-shopping-cart"
        badge="156"
        badge-color="primary"
    />
    <x-navigation::nav-item
        label="Pending"
        href="/orders/pending"
        icon="heroicon-o-clock"
        badge="23"
        badge-color="warning"
    />
    <x-navigation::nav-item
        label="Completed"
        href="/orders/completed"
        icon="heroicon-o-check-circle"
        badge="133"
        badge-color="success"
    />
</x-navigation::nav>
```
