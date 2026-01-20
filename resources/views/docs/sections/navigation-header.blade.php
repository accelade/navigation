@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-header" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('navigation::demo.partials._header-component')

    <x-accelade::code-block language="blade" filename="header-example.blade.php">
{{-- Basic header --}}
&lt;x-navigation::header class="flex items-center px-4 py-3 border-b"&gt;
    &lt;x-slot:leading&gt;
        &lt;x-navigation::sidebar.trigger&gt;
            &lt;button class="p-2"&gt;
                &lt;x-heroicon-o-bars-3 class="size-5" /&gt;
            &lt;/button&gt;
        &lt;/x-navigation::sidebar.trigger&gt;
    &lt;/x-slot:leading&gt;

    &lt;h1&gt;Dashboard&lt;/h1&gt;

    &lt;x-slot:trailing&gt;
        &lt;x-navigation::user-menu :user="auth()-&gt;user()" /&gt;
    &lt;/x-slot:trailing&gt;
&lt;/x-navigation::header&gt;

{{-- With breadcrumbs --}}
&lt;x-navigation::header&gt;
    &lt;x-slot:leading&gt;
        &lt;x-navigation::sidebar.trigger&gt;...&lt;/x-navigation::sidebar.trigger&gt;
    &lt;/x-slot:leading&gt;

    &lt;x-navigation::breadcrumb :items="$breadcrumbs" /&gt;

    &lt;x-slot:trailing&gt;
        &lt;button class="px-4 py-2 bg-blue-500 text-white rounded-lg"&gt;Save&lt;/button&gt;
    &lt;/x-slot:trailing&gt;
&lt;/x-navigation::header&gt;

{{-- With global search --}}
&lt;x-navigation::header&gt;
    &lt;x-slot:center&gt;
        &lt;div class="relative max-w-md w-full"&gt;
            &lt;input type="search" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg border" /&gt;
        &lt;/div&gt;
    &lt;/x-slot:center&gt;
&lt;/x-navigation::header&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
