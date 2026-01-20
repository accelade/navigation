@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-user-menu" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('navigation::demo.partials._user-menu-component')

    <x-accelade::code-block language="blade" filename="user-menu-example.blade.php">
{{-- Header user menu --}}
&lt;x-navigation::user-menu :user="auth()-&gt;user()"&gt;
    &lt;x-navigation::user-menu-item href="/profile"&gt;
        Profile
    &lt;/x-navigation::user-menu-item&gt;
    &lt;x-navigation::user-menu-item href="/settings"&gt;
        Settings
    &lt;/x-navigation::user-menu-item&gt;
    &lt;x-navigation::user-menu-item :danger="true"&gt;
        Sign out
    &lt;/x-navigation::user-menu-item&gt;
&lt;/x-navigation::user-menu&gt;

{{-- Custom trigger --}}
&lt;x-navigation::user-menu :user="$user"&gt;
    &lt;x-slot:trigger&gt;
        &lt;div class="flex items-center gap-2"&gt;
            &lt;img src="@{{ $user-&gt;avatar }}" class="size-8 rounded-full" /&gt;
            &lt;span&gt;@{{ $user-&gt;name }}&lt;/span&gt;
        &lt;/div&gt;
    &lt;/x-slot:trigger&gt;
    {{-- Menu items --}}
&lt;/x-navigation::user-menu&gt;

{{-- Sidebar user menu --}}
&lt;x-navigation::sidebar.footer&gt;
    &lt;x-navigation::sidebar.user-menu :user="auth()-&gt;user()"&gt;
        {{-- Menu items --}}
    &lt;/x-navigation::sidebar.user-menu&gt;
&lt;/x-navigation::sidebar.footer&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
