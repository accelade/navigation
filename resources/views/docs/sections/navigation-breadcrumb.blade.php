@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-breadcrumb" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('navigation::demo.partials._breadcrumb-component')

    <x-accelade::code-block language="blade" filename="breadcrumb-example.blade.php">
{{-- Basic breadcrumb --}}
&lt;x-navigation::breadcrumb
    :items="[
        ['label' =&gt; 'Dashboard', 'href' =&gt; '/dashboard'],
        ['label' =&gt; 'Users', 'href' =&gt; '/users'],
        ['label' =&gt; 'Edit User'],
    ]"
/&gt;

{{-- With home icon --}}
&lt;x-navigation::breadcrumb
    :items="$breadcrumbs"
    :home-icon="'&lt;svg&gt;...&lt;/svg&gt;'"
/&gt;

{{-- Custom separator --}}
&lt;x-navigation::breadcrumb
    :items="$breadcrumbs"
    separator="/"
    :show-home="false"
/&gt;

{{-- Manual items --}}
&lt;nav class="flex items-center gap-2 text-sm"&gt;
    &lt;ol class="flex items-center gap-2"&gt;
        &lt;x-navigation::breadcrumb-item href="/"&gt;Home&lt;/x-navigation::breadcrumb-item&gt;
        &lt;x-navigation::breadcrumb-separator /&gt;
        &lt;x-navigation::breadcrumb-item href="/blog"&gt;Blog&lt;/x-navigation::breadcrumb-item&gt;
        &lt;x-navigation::breadcrumb-separator /&gt;
        &lt;x-navigation::breadcrumb-item :current="true"&gt;Article&lt;/x-navigation::breadcrumb-item&gt;
    &lt;/ol&gt;
&lt;/nav&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
