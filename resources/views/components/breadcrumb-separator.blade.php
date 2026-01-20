@props([])

{{-- Breadcrumb Separator - Style-free separator between breadcrumb items --}}
<li
    data-slot="breadcrumb-separator"
    data-navigation="breadcrumb-separator"
    aria-hidden="true"
    {{ $attributes }}
>
    @if($slot->isEmpty())
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    @else
        {{ $slot }}
    @endif
</li>
