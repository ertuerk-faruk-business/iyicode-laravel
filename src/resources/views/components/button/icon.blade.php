@props(['href', 'action', 'icon', 'target', 'border', 'background', 'padding', 'type'])

@isset($href)
    <a href="{{ $href }}" target="{{ $target ?? '_self' }}">
        <div
            class="{{ $icon ?? 'text-black hover:underline' }} {{ $background }} {{ $border }} {{ $padding ?? 'p-1' }} cursor-pointer">
            {{ $slot }}
        </div>
    </a>
@else
    <button type="{{ $type ?? 'button' }}" wire:click="{{ $action ?? null }}" class="outline-none p-0 m-0">
        <div
            class="{{ $icon ?? 'text-black hover:underline' }} {{ $background }} {{ $border }} {{ $padding ?? 'p-1' }} cursor-pointer">
            {{ $slot }}
        </div>
    </button>
@endisset
