@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-theme-toggle" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('navigation::demo.partials._theme-toggle-component')

    <x-accelade::code-block language="blade" filename="theme-toggle-example.blade.php">
{{-- Basic theme toggle --}}
&lt;x-navigation::theme-toggle /&gt;

{{-- With system option --}}
&lt;x-navigation::theme-toggle :show-system="true" /&gt;

{{-- Custom icons --}}
&lt;x-navigation::theme-toggle&gt;
    &lt;x-slot:lightIcon&gt;
        &lt;x-heroicon-o-sun class="size-5" /&gt;
    &lt;/x-slot:lightIcon&gt;
    &lt;x-slot:darkIcon&gt;
        &lt;x-heroicon-o-moon class="size-5" /&gt;
    &lt;/x-slot:darkIcon&gt;
&lt;/x-navigation::theme-toggle&gt;

{{-- Styled toggle --}}
&lt;x-navigation::theme-toggle
    class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
/&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
