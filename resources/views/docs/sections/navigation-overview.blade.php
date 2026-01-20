@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-overview" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('navigation::demo.partials._sidebar-component')
    @include('navigation::demo.partials._nav-component')
    @include('navigation::demo.partials._theme-toggle-component')
    @include('navigation::demo.partials._user-menu-component')
    @include('navigation::demo.partials._breadcrumb-component')
    @include('navigation::demo.partials._header-component')
    @include('navigation::demo.partials._footer-component')

    <x-accelade::code-block language="blade" filename="sidebar-example.blade.php">
{{-- Sidebar with collapsible icon mode --}}
&lt;x-navigation::sidebar.provider :default-open="true"&gt;
    &lt;x-navigation::sidebar.sidebar collapsible="icon"&gt;
        &lt;x-navigation::sidebar.header&gt;
            {{-- Logo/Brand --}}
        &lt;/x-navigation::sidebar.header&gt;

        &lt;x-navigation::sidebar.content&gt;
            &lt;x-navigation::sidebar.menu&gt;
                &lt;x-navigation::sidebar.menu-item&gt;
                    &lt;x-navigation::sidebar.menu-button href="/dashboard" :is-active="true"&gt;
                        &lt;x-heroicon-o-home class="size-5" /&gt;
                        &lt;span&gt;Dashboard&lt;/span&gt;
                    &lt;/x-navigation::sidebar.menu-button&gt;
                &lt;/x-navigation::sidebar.menu-item&gt;
            &lt;/x-navigation::sidebar.menu&gt;
        &lt;/x-navigation::sidebar.content&gt;

        &lt;x-navigation::sidebar.footer&gt;
            {{-- User menu --}}
        &lt;/x-navigation::sidebar.footer&gt;
    &lt;/x-navigation::sidebar.sidebar&gt;

    &lt;x-navigation::sidebar.inset&gt;
        {{-- Main content with header trigger --}}
        &lt;header&gt;
            &lt;x-navigation::sidebar.trigger&gt;
                &lt;button&gt;Toggle Sidebar&lt;/button&gt;
            &lt;/x-navigation::sidebar.trigger&gt;
        &lt;/header&gt;
        {{-- Page content --}}
    &lt;/x-navigation::sidebar.inset&gt;
&lt;/x-navigation::sidebar.provider&gt;
    </x-accelade::code-block>

    <x-accelade::code-block language="blade" filename="navigation-example.blade.php">
{{-- Basic navigation --}}
&lt;x-navigation::nav&gt;
    &lt;x-navigation::nav-item label="Dashboard" href="/dashboard" icon="heroicon-o-home" /&gt;
    &lt;x-navigation::nav-item label="Users" href="/users" icon="heroicon-o-users" badge="12" /&gt;
&lt;/x-navigation::nav&gt;

{{-- With groups --}}
&lt;x-navigation::nav&gt;
    &lt;x-navigation::nav-group label="Content" icon="heroicon-o-folder"&gt;
        &lt;x-navigation::nav-item label="Posts" href="/posts" /&gt;
        &lt;x-navigation::nav-item label="Pages" href="/pages" /&gt;
    &lt;/x-navigation::nav-group&gt;
&lt;/x-navigation::nav&gt;

{{-- Horizontal --}}
&lt;x-navigation::nav direction="horizontal"&gt;
    &lt;x-navigation::nav-item label="Home" href="/" /&gt;
    &lt;x-navigation::nav-item label="About" href="/about" /&gt;
&lt;/x-navigation::nav&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
