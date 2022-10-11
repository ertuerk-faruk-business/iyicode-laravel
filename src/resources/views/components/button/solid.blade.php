@props(['href', 'action', 'icon', 'target', 'border', 'background', 'text', 'padding', 'type', 'root'])

@isset($href)
    <a href="{{ $href }}" target="{{ $target ?? '_self' }}" class="{{ $root ?? '' }}">
        <div
            class="{{ $text ?? 'text-black hover:underline' }} {{ $background }} {{ $border }} {{ $padding ?? 'px-4 py-2' }} text-center whitespace-nowrap select-none cursor-pointer">
            {{ $slot }}
        </div>
    </a>
@else
    <button type="{{ $type ?? 'button' }}" wire:click="{{ $action ?? null }}" class="outline-none p-0 m-0 {{ $root ?? '' }}">
        <div
            class="{{ $text ?? 'text-black hover:underline' }} {{ $background }} {{ $border }} {{ $padding ?? 'px-4 py-2' }} text-center whitespace-nowrap select-none cursor-pointer">
            {{ $slot }}
        </div>
    </button>
@endisset
