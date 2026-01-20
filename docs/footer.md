# Footer

Page footers with `<x-navigation::footer>`. Style-free component with automatic copyright and customizable slots.

## Basic Usage

```blade
<x-navigation::footer brand="My App" />
```

Outputs: `© 2024 My App. All rights reserved.`

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `copyright` | string | `null` | Custom copyright text |
| `brand` | string | config('app.name') | Brand/company name |
| `year` | string | current year | Copyright year |

## With Links

```blade
<x-navigation::footer brand="Accelade" class="flex items-center justify-between px-4 py-3 border-t">
    <a href="/privacy">Privacy</a>
    <a href="/terms">Terms</a>
    <a href="/contact">Contact</a>
</x-navigation::footer>
```

## Slots

| Slot | Description |
|------|-------------|
| `leading` | Left content (replaces default copyright) |
| `center` | Center content |
| `trailing` | Right content |
| default | Additional content after copyright |

## Custom Layout

```blade
<x-navigation::footer class="flex items-center justify-between px-6 py-4 border-t">
    <x-slot:leading>
        <div class="flex items-center gap-2">
            <img src="/logo.svg" class="h-6" alt="Logo" />
            <span>&copy; {{ date('Y') }} Accelade</span>
        </div>
    </x-slot:leading>

    <x-slot:center>
        <nav class="flex items-center gap-4">
            <a href="/about">About</a>
            <a href="/blog">Blog</a>
            <a href="/docs">Docs</a>
        </nav>
    </x-slot:center>

    <x-slot:trailing>
        <div class="flex items-center gap-3">
            <a href="https://github.com">
                <x-icon-github class="size-5" />
            </a>
            <a href="https://twitter.com">
                <x-icon-twitter class="size-5" />
            </a>
        </div>
    </x-slot:trailing>
</x-navigation::footer>
```

## Custom Copyright

```blade
<x-navigation::footer
    copyright="Made with ❤️ by Accelade Team"
    class="text-center py-4"
/>
```

## Styling

The component is style-free. Common patterns:

```blade
{{-- Simple footer --}}
<x-navigation::footer
    brand="My App"
    class="flex items-center justify-between px-4 py-3 text-sm text-gray-500 border-t"
/>

{{-- Centered footer --}}
<x-navigation::footer
    class="flex flex-col items-center gap-2 px-4 py-6 text-sm text-gray-500"
>
    <x-slot:leading>
        <nav class="flex gap-4">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
        </nav>
    </x-slot:leading>
    <x-slot:center>
        <p>&copy; {{ date('Y') }} My App</p>
    </x-slot:center>
</x-navigation::footer>
```

## Data Attributes

| Attribute | Description |
|-----------|-------------|
| `data-slot="footer"` | Main container |
| `data-navigation="footer"` | Navigation type |
| `data-slot="footer-copyright"` | Copyright text |
| `data-slot="footer-leading"` | Leading slot |
| `data-slot="footer-center"` | Center slot |
| `data-slot="footer-content"` | Default content |
| `data-slot="footer-trailing"` | Trailing slot |

## CSS Styling

```css
[data-slot="footer"] {
    @apply border-t border-gray-200 bg-white;
}

[data-slot="footer-copyright"] {
    @apply text-sm text-gray-500;
}

[data-slot="footer-content"] a {
    @apply text-sm text-gray-500 hover:text-gray-900 transition-colors;
}
```

## Full Page Example

```blade
<div class="min-h-screen flex flex-col">
    <x-navigation::header class="..." />

    <main class="flex-1">
        <!-- Page content -->
    </main>

    <x-navigation::footer brand="My App" class="border-t">
        <a href="/privacy">Privacy Policy</a>
        <a href="/terms">Terms of Service</a>
    </x-navigation::footer>
</div>
```
