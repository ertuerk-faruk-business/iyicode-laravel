@props(['href', 'action', 'icon', 'target', 'border', 'background', 'padding', 'type', 'root'])

@isset($href)
    <a href="{{ $href }}" target="{{ $target ?? '_self' }}" class="{{ $root ?? '' }}">
        <div
            class="{{ $icon ?? 'text-black hover:underline' }} {{ $background }} {{ $border }} {{ $padding ?? 'p-1' }} cursor-pointer">
            {{ $slot }}
        </div>
    </a>
@else
    <button type="{{ $type ?? 'button' }}" wire:click="{{ $action ?? null }}"
        class="outline-none p-0 m-0 {{ $root ?? '' }}">
        <div
            class="{{ $icon ?? 'text-black hover:underline' }} {{ $background }} {{ $border }} {{ $padding ?? 'p-1' }} cursor-pointer">
            {{ $slot }}
        </div>
    </button>
@endisset
