@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-footer" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('navigation::demo.partials._footer-component')

    <x-accelade::code-block language="blade" filename="footer-example.blade.php">
{{-- Basic footer --}}
&lt;x-navigation::footer brand="My App" /&gt;

{{-- With links --}}
&lt;x-navigation::footer brand="Accelade" class="flex items-center justify-between px-4 py-3 border-t"&gt;
    &lt;a href="/privacy"&gt;Privacy&lt;/a&gt;
    &lt;a href="/terms"&gt;Terms&lt;/a&gt;
    &lt;a href="/contact"&gt;Contact&lt;/a&gt;
&lt;/x-navigation::footer&gt;

{{-- Custom layout --}}
&lt;x-navigation::footer class="flex items-center justify-between px-6 py-4 border-t"&gt;
    &lt;x-slot:leading&gt;
        &lt;div class="flex items-center gap-2"&gt;
            &lt;img src="/logo.svg" class="h-6" alt="Logo" /&gt;
            &lt;span&gt;&copy; {{ date('Y') }} Accelade&lt;/span&gt;
        &lt;/div&gt;
    &lt;/x-slot:leading&gt;

    &lt;x-slot:trailing&gt;
        &lt;div class="flex items-center gap-3"&gt;
            &lt;a href="https://github.com"&gt;GitHub&lt;/a&gt;
            &lt;a href="https://twitter.com"&gt;Twitter&lt;/a&gt;
        &lt;/div&gt;
    &lt;/x-slot:trailing&gt;
&lt;/x-navigation::footer&gt;

{{-- Custom copyright --}}
&lt;x-navigation::footer copyright="Made with love by Accelade Team" /&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
