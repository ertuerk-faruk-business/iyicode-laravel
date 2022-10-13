@props(['bottom'])
<div class="sticky top-0 z-50">
    <x-iyicode::app-bar.desktop :bottom="$bottom ?? null"
        {{ $attributes->merge(['class' => 'h-full flex flex-row items-center']) }}>
        {{ $slot }}
    </x-iyicode::app-bar.desktop>
    <x-iyicode::app-bar.mobile :bottom="$bottom ?? null"
        {{ $attributes->merge(['class' => 'h-full flex flex-row items-center']) }}>
        {{ $slot }}
    </x-iyicode::app-bar.mobile>
</div>
